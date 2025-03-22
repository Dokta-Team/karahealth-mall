<?php

namespace App\Livewire\User;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Livewire\WithFileUploads;
use App\Models\ProductVarient;
use Illuminate\Support\Facades\Auth;

class AddEditProduct extends Component
{

    use WithFileUploads;

    public $confirmingId;


    public $product_id;
    public $product;

    public $name, $price, $before_discount_price, $quantity, $sku, $category_id, $brand_id;
    public $highlights, $detail, $delivery_available, $thumbnail_image, $thumbnail, $filename;
    public $variants = [];
    public $images = [];
    public $product_images = [];
    

    protected $listeners = [
        'dismiss' => 'dismiss', // Event name => method name
        'delete' => 'delete',
    ];


    public function addVariant()
    {
        $this->variants[] = ['id' => null, 'name' => '', 'price' => ''];
    }
    
    public function removeVariant($index)
    {
        if (isset($this->variants[$index]['id'])) {
            ProductVarient::find($this->variants[$index]['id'])->delete();
        }
        unset($this->variants[$index]);
        $this->variants = array_values($this->variants);
    }

    public function save()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'before_discount_price' => 'nullable|numeric',
            'quantity' => 'required|integer',
            'sku' => 'nullable|string|max:100',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'highlights' => 'required|string',
            'detail' => 'required|string',
            'delivery_available' => 'required|boolean',
            'variants.*.name' => 'string|max:255',
            'variants.*.price' => 'numeric',
        ];

        if($this->thumbnail) {
            $rules['thumbnail'] = 'required|mimes:jpeg,jpg,png|max:10240';
        }

        $this->validate($rules);


         if ($this->thumbnail) {
            $filename = time() . '_' . uniqid() . '.' . $this->thumbnail->getClientOriginalExtension();
            $this->thumbnail->storeAs('uploads/products', $filename, 'public');

        }



        $product = $this->product_id ? Product::find($this->product_id) : new Product(); 
        $product->name = $this->name;
        $product->slug = Str::slug($this->name);
        $product->price = $this->price;
        $product->before_discount_price = $this->before_discount_price;
        $product->quantity = $this->quantity;
        $product->sku = $this->sku;
        $product->category_id = $this->category_id;
        $product->brand_id = $this->brand_id;
        $product->highlights = $this->highlights;
        $product->detail = $this->detail;
        $product->delivery_available = $this->delivery_available;

        if(!$this->product_id){
            $product->user_id = Auth::id();
        }
        
        $product->thumbnail = isset($filename) ? $filename : $this->thumbnail_image;
        $product->save();

        foreach ($this->variants as $variant) {
            if (isset($variant['id']) && $variant['id']) {
                // Update existing variant
                ProductVarient::find($variant['id'])->update([
                    'name' => $variant['name'],
                    'price' => $variant['price'],
                    'product_id' => $product->id,
                ]);
            } else {
                // Create new variant
                ProductVarient::create([
                    'name' => $variant['name'],
                    'price' => $variant['price'],
                    'product_id' => $product->id,
                ]);
            }
        }
        

        foreach ($this->images as $image) {
            $filename = time() . '_' . uniqid() . '.' . $image['extension'];
            $destinationPath = public_path('uploads/products');
            
            // Ensure the destination directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            $tmpFilePath = $image['path'];
            if (file_exists($tmpFilePath)) {
                copy($tmpFilePath, $destinationPath . '/' . $filename); // Copy the file to the public directory
            }
            
            // Save the file path to the database
            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $filename, // Save the relative path
            ]);
            
        }
        

        // Reset form and show success message
        // if(!$this->product_id){
        //     $this->reset();
        // }
        $this->dispatch('show-toast', ['message' => 'Product saved successfully.']);

        // session()->flash('success', 'Product saved successfully.');
        $this->mount($this->product_id);


    }

    public function mount($id){

        if($id){
            $this->product_id = $id;
            $this->product = Product::find($this->product_id);
            $this->name = $this->product->name;
            $this->price = $this->product->price;
            $this->before_discount_price = $this->product->before_discount_price;
            $this->quantity =  $this->product->quantity;
            $this->sku = $this->product->sku;
            $this->category_id = $this->product->category_id;
            $this->brand_id = $this->product->brand_id;
            $this->highlights = $this->product->highlights;
            $this->detail = $this->product->detail;
            $this->delivery_available = $this->product->delivery_available;
            $this->thumbnail_image = $this->product->thumbnail;

            $this->product_images = ProductImage::where('product_id', $this->product_id)
            ->get(['id', 'image_path']);

            $this->variants = ProductVarient::where('product_id', $this->product_id)
            ->get(['id', 'name', 'price'])
            ->toArray();

        }
       
    }

        
    public function confirmDelete($id)
    {
        $this->confirmingId = $id;
        $this->dispatch('show-delete-modal');
    }

    public function dismiss()
    {
        $this->confirmingId = '';
    }

    
    public function delete()
    {
        if($this->confirmingId == 'thumbnail'){
            $product = Product::find($this->product_id);
            $product->thumbnail = null;
            $product->save();
            $this->thumbnail = null;
        }else{
            $image = ProductImage::find($this->confirmingId);
            $image->delete();
            $this->dispatch('show-toast', ['message' => 'Image has been deleted']);
            $this->confirmingId = '';
        }

        $this->dispatch('show-toast', ['message' => 'Image deleted successfully.']);


        $this->mount($this->product_id);


    }


    public function render()
    {
        return view('livewire.user.add-edit-product');
    }
}
