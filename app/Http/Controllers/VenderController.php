<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class VenderController extends Controller
{


    public function products(){

        return view('user.products');

    }

    public function addProduct(){
        $id = '';
        return view('user.add-edit-product', compact('id'));

    }

    public function editProduct($id){
        return view('user.add-edit-product', compact('id'));

    }

    public function deliveryOrders(){

        return view('user.delivery-orders');

    }

    
    public function viewOrder($id){

        return view('user.view-order');

    }

    public function editOrder($id){

        return view('user.edit-order');

    }


    

    

    
}
