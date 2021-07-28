<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //                                             View && Pagination

    public function index()
    {

         $products = Product::latest()->paginate(4);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //                                               Create Product

    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //                                               Validate && Redirect With Successed Notify


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'details'=>'required',
        ]);

        $product = Product::create($request->all());
        return redirect()->route('products.index')
        ->with('success', 'product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    //                                               View Product Info

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    //                                               Edit Product

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    //                                               Validate , Update && Redirect With Successed Notify

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'details'=>'required',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')
            ->with('success', 'product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    //                                               Delete && Redirect With Successed Notify

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'product deleted successfully');
    }
}
