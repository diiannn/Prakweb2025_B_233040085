<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Mengambil semua data kategori
        $categories = Category::all();
        // dd($categories);
        // Mengirim data ke view 'categories'
        return view('categories', compact('categories'));
    }
}