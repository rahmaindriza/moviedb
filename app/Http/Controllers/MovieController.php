<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('category')->paginate(10);
        return view('movie.index', compact('movies'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('movie.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|digits:4|integer',
            'actors' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['slug'] = $this->generateUniqueSlug($validated['title']);

        // Simpan cover jika ada
        if ($request->hasFile('cover_image')) {
            $filename = time() . '_' . $request->file('cover_image')->getClientOriginalName();
            $request->file('cover_image')->storeAs('public/covers', $filename);
            $validated['cover_image'] = $filename;
        }

        Movie::create($validated);

        return redirect()->route('movie.index')->with('success', 'Movie berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $movie = Movie::findOrFail($id);
        $categories = Category::all();
        return view('movie.edit', compact('movie', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|digits:4|integer',
            'actors' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $movie = Movie::findOrFail($id);

        // Update slug jika title berubah
        if ($movie->title !== $validated['title']) {
            $validated['slug'] = $this->generateUniqueSlug($validated['title']);
        } else {
            $validated['slug'] = $movie->slug;
        }

        // Jika cover baru diupload, hapus yang lama
        if ($request->hasFile('cover_image')) {
            if ($movie->cover_image && Storage::exists('public/covers/' . $movie->cover_image)) {
                Storage::delete('public/covers/' . $movie->cover_image);
            }

            $filename = time() . '_' . $request->file('cover_image')->getClientOriginalName();
            $request->file('cover_image')->storeAs('public/covers', $filename);
            $validated['cover_image'] = $filename;
        }

        $movie->update($validated);

        return redirect()->route('movie.index')->with('success', 'Movie berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);

        // Hapus gambar jika ada
        if ($movie->cover_image && Storage::exists('public/covers/' . $movie->cover_image)) {
            Storage::delete('public/covers/' . $movie->cover_image);
        }

        $movie->delete();

        return redirect()->route('movie.index')->with('success', 'Movie berhasil dihapus.');
    }

    // Buat slug unik
    private function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $original = $slug;
        $count = 1;

        while (Movie::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $count++;
        }

        return $slug;
    }
}
