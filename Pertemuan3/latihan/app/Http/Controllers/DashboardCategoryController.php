<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // PENTING: Import Str

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan view index kategori
        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:categories',
        ]);

        // Otomatis bikin slug dari nama kategori
        $validatedData['slug'] = Str::slug($request->name);

        Category::create($validatedData);

        return redirect()->route('dashboard.categories.index')->with('success', 'New category added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            // Validasi unique, mengabaikan kategori ini ($category->id)
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
        ];

        $validatedData = $request->validate($rules);

        $validatedData['slug'] = Str::slug($request->name);

        // Menggunakan method update() dari instance model
        $category->update($validatedData);

        return redirect()->route('dashboard.categories.index')->with('success', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect()->route('dashboard.categories.index')->with('success', 'Category deleted!');
    }
}