<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $data = [
        //     'categories' => Category::get(),
        // ];
        
        // // if (auth()->user() && auth()->user()->role->name == 'profession') {
        // //     $data['profession_categories'] = Category::whereHas('subCategories', function ($query) {
        // //         $query->where('type', 'profession')
        // //               ->whereHas('professions', function ($subQuery) {
        // //                   $subQuery->where('user_id', auth()->user()->id);
        // //               });
        // //     })->get();
        // //  }
                
        // View::share('data', $data);
    }
}
