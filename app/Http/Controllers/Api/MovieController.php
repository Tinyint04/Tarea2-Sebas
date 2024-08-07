<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->query('sortBy', 'id'); // Default sort by id
        $sortOrder = $request->query('sortOrder', 'asc'); // Default sort order ascending

        $movies = Movie::with('category')->orderBy($sortBy, $sortOrder)->get();
        return response()->json($movies, 200);
        
    }


    public function create()
    {
        $categories = Category::all();
        return view('movies.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        $movie = Movie::create($request->all());

        return response()->json($movie, 201);
    }

    public function show($id)
    {
        $movie = Movie::with('category')->find($id);

        if (!$movie) {
            return response()->json(['message' => 'Movie not found'], 404);
        }

        return response()->json($movie, 200);
    }


    public function edit(Movie $movie)
    {
        $categories = Category::all();
        return view('movies.edit', compact('movie', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json(['message' => 'Movie not found'], 404);
        }

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        $movie->update($request->all());

        return response()->json($movie, 200);
    }
    
    public function destroy($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json(['message' => 'Movie not found'], 404);
        }

        $movie->delete();

        return response()->json(['message' => 'Movie deleted successfully'], 200);
    }
}
