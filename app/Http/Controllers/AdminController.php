<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    
    public function categories(){

        return view('user.categories');
    }

    public function addCategory(){
        $id = '';

        return view('user.add-edit-category', compact('id'));
    }

    public function editCategory($id){
        return view('user.add-edit-category', compact('id'));
    }

    public function subCategories($id){
        $category = Category::find($id);
        return view('user.sub-categories', compact('id','category'));
    }

    public function users(){
        return view('user.users');
    }

    public function editUser(Request $request, $id){
        $user = User::findOrFail($id);

        return view('user.edit-user', compact('user'));


    }


    public function updateUser(Request $request, $id){

        $user = User::findOrFail($id);
        
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|max:255|unique:users,email,' . $id,
             'phone' => 'nullable|string|max:20',
             'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
             'documents' => 'nullable|array',
             'documents.*' => 'file|mimes:zip,pdf,doc,docx,jpg,jpeg,png,gif|max:5120',
 
         ]);
 
         if ($request->hasFile('profile_image')) {
             $filename = $id . '.' . $request->file('profile_image')->getClientOriginalExtension();
             $request->file('profile_image')->storeAs('uploads/users', $filename, 'public');
         
             $user->profile_image = $filename;
         }
 
         $user->name = $request->name;
         $user->email = $request->email;
         $user->phone = $request->phone;
         $user->address_1 = $request->address_1;
         $user->address_2 = $request->address_2;
         $user->area_region = $request->area_region;
         $user->state = $request->state;
         $user->country = $request->country;
         $user->type_classification = $request->type_classification;
 
         if ($request->hasFile('documents')) {
             $folderPath = 'uploads/documents/' . $id;
         
             // Remove all existing files in the user's folder
             Storage::disk('public')->deleteDirectory($folderPath);
         
             $uploadedFiles = [];
             foreach ($request->file('documents') as $index => $file) {
 
                 $filename = 'file_' . ($index + 1) . '.' . $file->getClientOriginalExtension();
                 $file->storeAs($folderPath, $filename, 'public');
                 $uploadedFiles[] = $filename;
             }
         
             // Save file names as JSON in the database
             $user->documents = json_encode($uploadedFiles);
             $user->save();
         }
         
 
         $user->contact_person = $request->contact_person;
         $user->website = $request->website;
         $user->coordinates = $request->coordinates;
         $user->status = $user->status ? 0 : 1;

         $user->save();
 
         return back()->with('success', 'Profile updated successfully!');
    }

    

    
}
