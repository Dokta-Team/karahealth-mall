<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    
    public function index(){

        return view('customer.home');

    }

    public function updateDetails(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Old password is incorrect.');
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->back()->with('success', 'Password changed successfully.');
    }


    public function wishlist(){

        return view('customer.wishlist');

    }

    

    public function orders(){

        return view('customer.orders');

    }

    public function trackOrder($id)
    {
        $order = Cart::where('id', $id)
            ->where('user_id', Auth::id()) 
            ->with('product', 'address')
            ->firstOrFail();

        return view('customer.track-order', compact('order'));
    }

    public function transactions(){

        return view('customer.transactions');

    }

    public function address(){

        return view('customer.address');

    }


    public function account(){

        return view('customer.account');

    }
}
