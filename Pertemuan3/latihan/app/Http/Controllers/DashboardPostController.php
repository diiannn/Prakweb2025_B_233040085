<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Tambahkan ini untuk validasi manual

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // PERBAIKAN: Gunakan 'Post' (huruf besar)
        $posts = Post::where('user_id', auth()->user()->id);

        // Fitur Search
        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%');
        }

        // PERBAIKAN: Typo 'dasboard' -> 'dashboard'
        return view('dashboard.index', [
            'posts' => $posts->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua category
        $categories = Category::all();

        // PERBAIKAN: Typo 'dasboard' -> 'dashboard'
        return view('dashboard.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input (Sesuai Modul Hal 22)
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Jika validasi gagal, kembali ke form dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // 2. Generate Slug Unik (Sesuai Modul Hal 20)
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        // 3. Handle File Upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post-images', 'public');
        }

        // 4. Create Post
        Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image' => $imagePath,
            'user_id' => auth()->user()->id,
        ]);

        // 5. Redirect setelah sukses
        return redirect()->route('dashboard.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    // PERBAIKAN: Gunakan Route Model Binding (Post $post) bukan (string $id)
    // Pastikan route di web.php pakai '/dashboard/{post:slug}'
    public function show(Post $post)
    {
        // PERBAIKAN: Typo 'dasboard' -> 'dashboard'
        return view('dashboard.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Ambil semua kategori untuk dropdown
        $categories = Category::all();

        // Tampilkan view edit dengan data post dan kategori
        return view('dashboard.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // 1. Validasi Input
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'image' => 'image|file|max:2048' // Validasi gambar
        ];

        $validatedData = $request->validate($rules);

        // 2. Cek Slug (Jika Title berubah, generate ulang slug baru)
        if ($request->title != $post->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;
            // Cek duplikat slug (kecuali punya post ini sendiri)
            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
            $validatedData['slug'] = $slug;
        }

        // 3. Cek Gambar Baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($post->image) {
                Storage::delete('public/' . $post->image); // Sesuaikan path delete
            }
            // Simpan gambar baru
            $validatedData['image'] = $request->file('image')->store('post-images', 'public');
        }

        // 4. Set User ID (agar tidak berubah/aman)
        $validatedData['user_id'] = auth()->user()->id;

        // 5. Update Data
        Post::where('id', $post->id)->update($validatedData);

        return redirect()->route('dashboard.index')->with('success', 'Post updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // 1. Hapus Gambar Lama (Jika ada)
        // Kita cek dulu apakah post ini punya gambar
        if ($post->image) {
            Storage::delete($post->image);
            // Catatan: Jika pakai 'public/', sesuaikan jadi Storage::delete('public/' . $post->image);
            // Tapi biasanya dari symlink cukup nama filenya saja jika disimpan via ->store()
        }

        // 2. Hapus Data dari Database
        Post::destroy($post->id);

        // 3. Redirect kembali ke dashboard dengan pesan sukses
        return redirect()->route('dashboard.index')->with('success', 'Post has been deleted!');
    }
}