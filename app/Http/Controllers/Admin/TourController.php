<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = Tour::with('category')->get(); // optimize
        return view('admin.tours.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.tours.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'image' => 'sometimes|image',
        ]);

        $tour = Tour::create($request->all());

        if($request->image){
            $image = 'storage/' . $request->file('image')->store('public/images');
            $tour->image = $image;
            $tour->save();
        }

        return redirect()->route('tours.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->route('tours.index');
    }
}
