<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Profession;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    public function index(){

        return view('user.home');

    }

    public function addProfession(){

        $id = '';

        return view('user.add-edit-profession', compact('id'));

    }

    
    public function professionsCategory(){


        return view('user.add-edit-profession', compact('id'));

    }

        
    public function professions($slug){

        $category = SubCategory::where('slug', $slug)->first();

        $professions = Profession::whereHas('sub_category', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
        
        return view('user.professions', compact('professions', 'category'));

    }

    


    

    
}
