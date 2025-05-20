<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function homepage()
    {
        $movies = Movie::latest()->paginate(6);
        return view('homepage', compact('movies'));
    }
//tampilan detail yg indri buat
//     public function show($slug)
// {
//     $movie = Movie::where('slug', $slug)->firstOrFail();
//     return view('detail', compact('movie'));
// }

public function detail($id,$slug)
    {
        $movie = Movie::findOrfail($id);
        return view('detailmovie', compact('movie'));
    }


}
