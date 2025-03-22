<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Profession;
use App\Models\Specialist;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirectDashboard()
    {
        $user = Auth::user();

        // Check if the user has the 'admin', 'vendor', or 'person' role
        if ($user->role->name == 'admin' || $user->role->name == 'vendor' || $user->role->name == 'profession') {
            return redirect()->route('user.dashboard');
        }

        return redirect()->route('customer.orders');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $featured = Product::where('featured', 1)->get();
        $products = Product::orderBy('id', 'DESC')->paginate(28);

        $hospitals = Profession::whereHas('sub_category', function ($query){
            $query->where('category_id', 8);
        })->orderBy('id', 'DESC')->take('10')->get();

        return view('home', compact('featured', 'hospitals', 'products'));
    }

    public function search(Request $request)
    {
        $categories = SubCategory::get();

        $query = $request->q;
        $products = collect();
        $professions = collect();

        if ($request->has('products') && $request->products == 'true') {
            // Get all subcategories where type = 'product'
            $sub_category_ids = SubCategory::where('type', 'product')->pluck('id');
        } elseif ($request->has('category') || $request->has('sub_category')) {
            // Process category and subcategory parameters
            $category = Category::where('slug', $request->category)->first();

            $sub_category_slugs = explode(',', $request->sub_category);
            $sub_categories = SubCategory::whereIn('slug', $sub_category_slugs)->get();

            if ($sub_categories->isNotEmpty()) {
                $sub_category_ids = $sub_categories->pluck('id');
            } else {
                $sub_category_ids = SubCategory::where('category_id', $category->id)->pluck('id');
            }
        }

        // If category/subcategory/product filters exist, fetch products and professions
        if (isset($sub_category_ids)) {
            $products = Product::whereIn('category_id', $sub_category_ids)->get();
            $professions = Profession::whereIn('sub_category_id', $sub_category_ids)->get();
        }

        // If a query is provided, perform a LIKE search across multiple columns
        if ($query) {
            // if ($request->has('query') && $request->query != '') {

            $products = Product::where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                ->orWhere('highlights', 'LIKE', "%{$query}%")
                ->orWhere('detail', 'LIKE', "%{$query}%");
            });

            $professions = Profession::where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->orWhere('short_description', 'LIKE', "%{$query}%")
                ->orWhere('title', 'LIKE', "%{$query}%");
            });

            // If sub_category_ids exist, apply additional filtering
            if (isset($sub_category_ids)) {
                $products->whereIn('category_id', $sub_category_ids);
                $professions->whereIn('sub_category_id', $sub_category_ids);
            }

            // Execute queries
            $products = $products->get();
            $professions = $professions->get();
        }

        

        return view('search', compact('categories','products','professions'));
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('product', compact('product'));
    }

    
    public function profession($slug)
    {
        $profession = Profession::where('slug', $slug)->firstOrFail();

        $professions = Profession::where('sub_category_id', $profession->sub_category_id)->get();
        return view('profession', compact('profession', 'professions'));
    }



    

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {
        return redirect()->route('thank-you');
    }

    public function thankYou()
    {
        return view('thank-you');
    }

    

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function termsAndConditions()
    {
        return view('terms-and-conditions');
    }

    public function supportPolicy()
    {
        return view('support-policy');
    }

    public function returnAndRefundPolicy()
    {
        return view('return-and-refund-rolicy');
    }

    public function faqs()
    {
        return view('faqs');
    }

    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    public function partnershipPolicy()
    {
        return view('partnership-policy');
    }

    public function intellectualPropertyPolicy()
    {
        return view('intellectual-property-policy');
    }
}
