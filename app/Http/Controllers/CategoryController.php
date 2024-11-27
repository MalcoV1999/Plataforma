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

    public function create()
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
            'status' => 'nullable|boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status') ? true : false; // Manejo del checkbox

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $category = Category::create($data);

        return redirect()->route('category.show', $category->id)->with('success', 'Categoría creada exitosamente');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Categoría eliminada exitosamente');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'nullable|boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        $category = Category::findOrFail($id);
        $data = $request->all();
        $data['status'] = $request->has('status') ? true : false; // Manejo del checkbox

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $category->update($data);

        return redirect()->route('category.show', $id)->with('success', 'Categoría actualizada exitosamente');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Categoría eliminada exitosamente');
    }
}
