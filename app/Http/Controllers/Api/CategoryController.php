<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($category);
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new category
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Return the created category
        return response()->json($category, 201);
    }

    public function update(Request $request, $id)
    {
        // Find the category by ID
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update the category
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Return the updated category
        return response()->json($category);
    }

    public function destroy($id)
    {
        // Find the category by ID
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        // Delete the category
        $category->delete();

        // Return a success message
        return response()->json(['message' => 'Category deleted successfully']);
    }
}