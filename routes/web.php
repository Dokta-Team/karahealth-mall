<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VenderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfessionController;

Route::get('/dashboard', [HomeController::class, 'redirectDashboard'])->name('dashboard');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');


Route::get('/product/{slug}', [HomeController::class, 'product'])->name('product');
Route::get('/profession/{slug}', [HomeController::class, 'profession'])->name('profession');

Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/thank-you', [HomeController::class, 'thankYou'])->name('thank-you');

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/terms-and-conditions', [HomeController::class, 'termsAndConditions'])->name('terms-and-conditions');
Route::get('/support-policy', [HomeController::class, 'supportPolicy'])->name('support-policy');
Route::get('/return-and-refund-rolicy', [HomeController::class, 'returnAndRefundPolicy'])->name('return-and-refund-rolicy');
Route::get('/faqs', [HomeController::class, 'faqs'])->name('faqs');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/partnership-policy', [HomeController::class, 'partnershipPolicy'])->name('partnership-policy');
Route::get('/intellectual-property-policy', [HomeController::class, 'intellectualPropertyPolicy'])->name('intellectual-property-policy');



Route::group(['middleware' => ['auth', 'verified', 'role:customer'], 'prefix' => 'customer'], function () {

    Route::get('/orders', [CustomerController::class, 'orders'])->name('customer.orders');
    Route::get('/track-order/{id}', [CustomerController::class, 'trackOrder'])->name('customer.track-order');
    Route::get('/wishlist', [CustomerController::class, 'wishlist'])->name('customer.wishlist');
    Route::get('/transactions', [CustomerController::class, 'transactions'])->name('customer.transactions');
    Route::get('/address', [CustomerController::class, 'address'])->name('customer.address');
    Route::get('/account', [CustomerController::class, 'account'])->name('customer.account');
    Route::post('/update-details', [CustomerController::class, 'updateDetails'])->name('customer.update.details');
    Route::post('/update-password', [CustomerController::class, 'updatePassword'])->name('customer.update.password');
});

Route::group(['middleware' => ['auth', 'role:admin', 'verified'], 'prefix' => 'user'], function () {
    Route::get('/categories', [AdminController::class, 'categories'])->name('user.categories');
    Route::get('/add-category', [AdminController::class, 'addCategory'])->name('user.add-category');
    Route::get('/edit-category/{id}', [AdminController::class, 'editCategory'])->name('user.edit-category');

    Route::get('/sub-categories/{id}', [AdminController::class, 'subCategories'])->name('user.sub-categories');
    Route::get('/add-sub-category/{id}', [AdminController::class, 'addSubCategory'])->name('user.add-sub-category');
    Route::get('/edit-sub-category/{id}', [AdminController::class, 'editSubCategory'])->name('user.edit-sub-category');

    Route::get('/users', [AdminController::class, 'users'])->name('user.users');
    Route::get('/user/edit/{id}', [AdminController::class, 'editUser'])->name('user.user.edit');
    Route::put('/user/update/{id}', [AdminController::class, 'updateUser'])->name('user.user.update');

});


Route::group(['middleware' => ['auth', 'verified', 'role:admin,vendor'], 'prefix' => 'user'], function () {
    

    Route::get('/products', [VenderController::class, 'products'])->name('user.products');
    Route::get('/add-product', [VenderController::class, 'addProduct'])->name('user.add-product');
    Route::get('/edit-product/{id}', [VenderController::class, 'editProduct'])->name('user.edit-product');

    Route::get('/delivery-orders', [VenderController::class, 'deliveryOrders'])->name('user.delivery-orders');
    Route::get('/pickup-orders', [VenderController::class, 'pickupOrders'])->name('user.pickup-orders');

    Route::get('/view-order/{id}', [VenderController::class, 'viewOrder'])->name('user.view-order');
    Route::get('/edit-order/{id}', [VenderController::class, 'editOrder'])->name('user.edit-order');

    Route::get('/transactions', [VenderController::class, 'transactions'])->name('user.transactions');
});

Route::group(['middleware' => ['auth', 'verified', 'role:admin,profession'], 'prefix' => 'user'], function () {

    Route::get('/add-profession', [ProfessionController::class, 'addProfession'])->name('user.add-profession');
    Route::get('/edit-profession/{id}', [ProfessionController::class, 'editProfession'])->name('user.edit-profession');

    Route::get('/professions/category/{slug}', [ProfessionController::class, 'professions'])->name('user.professions');
});


Route::group(['middleware' => ['auth', 'role:admin,vendor,profession', 'verified'], 'prefix' => 'user'], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');

});




Route::get('/logout', function () {
    if (Auth::logout()) {
        return redirect()->route('home');
    } else {
        return redirect()->back();
    }
})->name('logout');;


require __DIR__ . '/auth.php';
