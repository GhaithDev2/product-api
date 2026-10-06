<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $product=Product::query()->get();
        return response()->json($product);
    }



    public function store(Request $request){

        $validated=$request->validate([

        'name'=>['required','min:3'],
        'price'=>['required','numeric','min:0'],
        'description'=>['nullable','min:5'],
        'quantity'=>['required','integer','min:0'],

        ]);
        $product=Product::query()->create($validated);
        return response()->json([
            'message'=>"product created successfully",
            'product'=>$product
        ],201);
    }





    public function update(Request $request,$id){

        $validated=$request->validate([

        'name'=>['nullable','min:3'],
        'price'=>['nullable','numeric','min:0'],
        'description'=>['nullable','min:5'],
        'quantity'=>['nullable','integer','min:0'],

        ]);
        $product=Product::findOrFail($id);
        $product->update($validated);
        return response()->json([
            'message'=>"product updated successfully",
            'product'=>$product
        ]);

    }





    public function destroy($id){
        $product=Product::query()->where('id',$id)->delete();
        return response()->json([
            'message'=>"product deleted successfully"
        ],200);
    }






    public function show($id){
        $product=Product::query()->where('id',$id)->first();
        return response()->json($product);



    }

}
