<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryItems = Category::orderBy('created_at', 'desc')->get();
        return view('category.categoryList', compact('categoryItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.categoryCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|regex:/^[a-zA-Z0-9\s]+$/'
        ]);
        $records = Category::create([
            'title' => $request->input('title')
        ]);
        if($records){
            $request->session()->flash('success', 'Category Created Successfully');
        } else {
            $request->session()->flash('error', 'Category Creation Failed');
        }
        return redirect()->route('category.categoryList');
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
        $categoryItems = Category::find($id);
        return view('category.categoryEdit', compact('categoryItems', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Category::findOrFail($id);
       if( $item->update([
            'title' => $request->title,
        ]) ){
           $request->session()->flash('success', 'Category Updated Successfully');
    }else {
           $request->session()->flash('error', 'Category Update Failed');
       }
        return redirect()->route('category.categoryList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = Category::find($id);
        $record->delete();
        return redirect()->route('category.categoryList');
    }
}
