<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


// class myproductcontroller extends Controller
// {
//     //
// }


class myproductcontroller extends Controller
{
    public function index(){
        $allproducts=Product::get();
        return view('index',['allproducts'=>$allproducts]);
    }

    public function createproduct(){
        return view('productadd');
    }  

    public function productstore(Request $request){
        $name = $request->input('name');
        $description = $request->input('description');
        $image = $request->input('image');
        $productmodel=new Product();
        try {
            $productmodel = new Product();
            $productmodel->name = $name;
            $productmodel->image = $image;
            $productmodel->description = $description;
            $productmodel->save();
            $allproducts=Product::get();
            return view('allproducts',['allproducts'=>$allproducts]);
          
        } catch (\Exception $e) {
            // Log the database error to help diagnose the issue
            // Log::error($e->getMessage());
        }   
        
    }

    
    public function allproducts(Request $request){
        $allproducts=Product::get();
        return view('allproducts',['allproducts'=>$allproducts]);
    }  

    public function editproduct($id){
        $allproducts=Product::find($id);
        return view('editproduct',['products'=>$allproducts]);
    

    } 
    

    public function myeditproduct(Request $request, $id){
        $name = $request->input('name');
        $description = $request->input('description');
        $image = $request->input('image');
        $allproducts=Product::find($id);
        $allproducts->name = $name;
        $allproducts->image = $image;
        $allproducts->description = $description;
        $allproducts->save();
        $allproducts=Product::get();
        return view('allproducts',['allproducts'=>$allproducts]);


    } 


    

    public function deleteproduct(Request $request, $id){
        $allproducts=Product::find($id);
        $allproducts->delete();
        $allproducts=Product::get();
        return view('allproducts',['allproducts'=>$allproducts]);


    } 

}