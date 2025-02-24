<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productItems = Product::all();
        return view('product.productList', compact('productItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.productCreate', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|regex:/^[a-zA-Z0-9\s]+$/',
            'category_id' => 'required|integer',
            'price' => 'required|integer|regex:/^\d+(\.\d{1,2})?$/|min:0',
            'status' => 'required|boolean',
            'quantity' => 'required|integer|min:0',
            'order' => 'required|integer|min:0'
        ]);

       $records = Product::create([
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
            'quantity' => $request->input('quantity'),
            'order' => $request->input('order')
        ]);

        if($records){
            $request->session()->flash('success', 'Category Created Successfully');
        } else {
            $request->session()->flash('error', 'Category Creation Failed');
        }

        return redirect()->route('product.productList');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $productItems = Product::find($id);
        $categories = Category::all();
        return view('product.productEdit', compact('productItems'), compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|regex:/^[a-zA-Z0-9\s]+$/',
            'category_id' => 'required|integer',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|min:0',
            'status' => 'required|boolean',
            'quantity' => 'required|integer|min:0',
            'order' => 'required|integer|min:0'
        ]);

        $resource = Product::find($id);
       if( $resource->update($request->all()) ){
           $request->session()->flash('success', 'Product Updated Successfully');
       } else{
           $request->session()->flash('error', 'Product Update Failed');
       }

        return redirect()->route('product.productList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = Product::find($id);
        $record->delete();
        return redirect()->route('product.productList');
    }
}
