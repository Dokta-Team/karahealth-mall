<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function dashboard()
    {

        return view('user.home');
    }

    public function profile()
    {

        return view('user.profile');
    }

    public function updateProfile(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'documents' => 'nullable|array',
            'documents.*' => 'file|mimes:zip,pdf,doc,docx,jpg,jpeg,png,gif|max:5120',

        ]);

        if ($request->hasFile('profile_image')) {
            $filename = $user->id . '.' . $request->file('profile_image')->getClientOriginalExtension();
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
            $folderPath = 'uploads/documents/' . $user->id;
        
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
        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }
}
