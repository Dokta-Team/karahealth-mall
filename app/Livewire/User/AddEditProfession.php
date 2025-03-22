<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Category;
use App\Models\Profession;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class AddEditProfession extends Component
{

    use WithFileUploads;

    public $confirmingId;

    public $profession_id;
    public $profession;
    public $thumbnail, $thumbnail_image, $sub_category, $name, $title, $experience, $email, $phone, $link, $location, $short_description, $description;

    protected $listeners = [
        'dismiss' => 'dismiss',
        'delete' => 'delete',
    ];

    public function save()
    {
        $rules = [
            'sub_category' => 'required',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|regex:/^[\d\+\-\(\) ]{10,20}$/',
            'link' => 'nullable|url|max:255',
            'location' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
        ];
        
        if ($this->thumbnail) {
            $rules['thumbnail'] = 'required|mimes:jpeg,jpg,png|max:10240';
        }
        
        $this->validate($rules);


         if ($this->thumbnail) {
            $filename = time() . '_' . uniqid() . '.' . $this->thumbnail->getClientOriginalExtension();
            $this->thumbnail->storeAs('uploads/professions', $filename, 'public');

        }

        $profession = $this->profession_id ? Profession::find($this->profession_id) : new Profession(); 
        $profession->sub_category_id = $this->sub_category;
        $profession->thumbnail = isset($filename) ? $filename : $this->thumbnail_image;
        $profession->name = $this->name;
        $profession->slug = Str::slug($this->name);
        $profession->title = $this->title;
        $profession->experience = $this->experience;
        $profession->email = $this->email;
        $profession->phone = $this->phone;
        $profession->link = $this->link;
        $profession->location = $this->location;
        $profession->short_description = $this->short_description;
        $profession->description = $this->description;

        if(!$this->profession_id){
            $profession->user_id = Auth::id();
        }
        

        $profession->save();

        $this->dispatch('show-toast', ['message' => 'Profession saved successfully.']);

        $this->mount($this->profession_id);

    }

    public function mount($id){

        if($id){
            $this->profession_id = $id;
            $this->profession = Profession::find($this->profession_id);
            $this->name = $this->profession->name;
            $this->thumbnail_image = $this->profession->thumbnail;

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
            $profession = Profession::find($this->profession_id);
            $profession->thumbnail = null;
            $profession->save();
            $this->thumbnail = null;
        }

        $this->dispatch('show-toast', ['message' => 'Image deleted successfully.']);


        $this->mount($this->profession_id);


    }


    
    public function render()
    {
        $categories = Category::whereHas('subCategories', function ($query) {
            $query->where('type', 'profession');
        })->get();

        return view('livewire.user.add-edit-profession', compact('categories'));
    }

}
