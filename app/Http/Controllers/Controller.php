<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

abstract class Controller
{
    public function __construct()
    {
        $data = [
            'categories' => Category::get(),
            'profession_categories' => [],
        ];

        if (Auth::check() && (Auth::user()->role->name == 'profession' || Auth::user()->role->name == 'admin') ) {
            $data['profession_categories'] = Category::whereHas('subCategories', function ($query) {

                if(Auth::user()->role->name == 'admin'){
                    $query->whereHas('professions');
                }else{
                    $query->whereHas('professions', function ($subQuery) {
                        $subQuery->where('user_id', Auth::id());
                    });
                }

            })->with(['subCategories' => function ($query) {
                if(Auth::user()->role->name == 'admin'){
                    $query->whereHas('professions');
                }else{
                    $query->whereHas('professions', function ($subQuery) {
                        $subQuery->where('user_id', Auth::id());
                    });
                }
            }])->get();
            
        }

        View::share('data', $data);
    }
}
