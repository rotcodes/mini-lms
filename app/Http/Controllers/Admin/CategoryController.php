<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category; // Make sure to import the Category model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.list', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:categories',
            'icon' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        // Create a new category instance
        $category = new Category();
        $category->name = $request->input('name'); // Get validated name input
        $category->icon = $request->input('icon'); // Get validated name input

        // Handle the uploaded image
        if ($request->hasFile('image')) {

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = '-'.time().'.'.$ext;
            $image->move(public_path('uploads/categories/'), $imageName);

            // Save image name in database
            $category->image = $imageName;
            $category->save();
        }

        // Save the category to the database
        $category->save();

        session()->flash('success', 'Category created successfully!');

        return response()->json([
            'status' => true,
            'message' => 'Category created successfully!',
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Logic for displaying a specific category (optional)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:categories,name,'.$id,
            'icon' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        // Find the category
        $category = Category::findOrFail($id);
        $category->name = $request->input('name'); // Get validated name input
        $category->icon = $request->input('icon'); // Get validated name input

        // Handle the uploaded image
        if ($request->hasFile('image')) {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = '-'.time().'.'.$ext;
            $image->move(public_path('uploads/categories/'), $imageName);
            $category->image = $imageName; // Save image name in database
        }

        // Save the category to the database
        $category->save();

        session()->flash('success', 'Category updated successfully!');

        return response()->json([
            'status' => true,
            'message' => 'Category updated successfully!',
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the category
        $category = Category::findOrFail($id);

        // Delete the category
        $category->delete();

        session()->flash('success', 'Category deleted successfully!');

        return response()->json([
            'status' => true,
            'message' => 'Category deleted successfully!',
        ]);
    }
}
