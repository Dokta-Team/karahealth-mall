<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddEditCategory extends Component
{
    use WithFileUploads;

    public $confirmingId;

    public $category_id;
    public $category;
    public $name, $thumbnail, $thumbnail_image;

    protected $listeners = [
        'dismiss' => 'dismiss', // Event name => method name
        'delete' => 'delete',
    ];

    public function save()
    {
        $rules = [
            'name' => 'required|string|max:255',
   
        ];

        if($this->thumbnail) {
            $rules['thumbnail'] = 'required|mimes:jpeg,jpg,png|max:10240';
        }

        $this->validate($rules);


         if ($this->thumbnail) {
            $filename = time() . '_' . uniqid() . '.' . $this->thumbnail->getClientOriginalExtension();
            $this->thumbnail->storeAs('uploads/categories', $filename, 'public');

        }



        $category = $this->category_id ? Category::find($this->category_id) : new Category(); 
        $category->name = $this->name;
        $category->slug = Str::slug($this->name);
        $category->image = isset($filename) ? $filename : $this->thumbnail_image;
        $category->save();



        $this->dispatch('show-toast', ['message' => 'Category saved successfully.']);

        $this->mount($this->category_id);


    }

    public function mount($id){

        if($id){
            $this->category_id = $id;
            $this->category = Category::find($this->category_id);
            $this->name = $this->category->name;
            $this->thumbnail_image = $this->category->image;

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
            $category = Category::find($this->category_id);
            $category->image = null;
            $category->save();
            $this->thumbnail = null;
        }

        $this->dispatch('show-toast', ['message' => 'Image deleted successfully.']);


        $this->mount($this->category_id);


    }


    
    public function render()
    {
        return view('livewire.user.add-edit-category');
    }
}
