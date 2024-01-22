<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all(); // Select * From products
        return ['page'=> 'index', 'payload'=> $product];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pd = Product::create([
            'product_name' => $request->pd_name,
            'product_type' => $request->pd_type,
            'price' => $request->pd_price,
        ]);
        return ["message"=> "Insert Successfully."];
    }

    /**
     * Display the specified resource.
     */
    public function show($product)
    {
        $result = Product::find($product);
        // $result = Product::where('id', $product)->get();
        return ['page'=> $product, 'payload'=> $result];
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->product_name = $request->pd_name;
        $product->price = $request->pd_price;
 
        $product->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
