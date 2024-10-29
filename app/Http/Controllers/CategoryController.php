<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', ['categories' => $categories]);
    }

    public function indexcreate()
    {
        return view('category.create');
    }

    
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('category.show', ['category' => $category]);
    }

    public function indexupdate($id)
    {
        $category = Category::findOrFail($id);
        return view('category.update', ['category' => $category]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        $category = Category::create($request->all());


        return redirect()->route('category.show', $category->id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('category.show', $id);
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        
        return redirect()->route('category.index');
    }
}
