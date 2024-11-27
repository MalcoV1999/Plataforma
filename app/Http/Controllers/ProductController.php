<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category; 
use App\Models\Region;  
use App\Models\Point;    
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }

    public function create()
{
    $categories = Category::all(); // Obtén todas las categorías
    $regions = Region::all();     // Obtén todas las regiones
    $points = Point::all();       // Obtén todos los puntos

    return view('product.create', compact('categories', 'regions', 'points'));
}


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', ['product' => $product]);
    }

    public function indexupdate($id)
    {
        $product = Product::findOrFail($id);
        return view('product.update', ['product' => $product]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'sku' => 'required|string|unique:products,sku',
            'price' => 'required|numeric|between:0,99999.99',
            'points_price' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'region_id' => 'required|exists:regions,id',
            'point_id' => 'required|exists:points,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('product_images', 'public');
        }

        Product::create($data);

        return redirect()->route('product.index')
            ->with('success', 'Product created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'sku' => 'required|string|unique:products,sku,' . $id,
            'price' => 'required|numeric|between:0,99999.99',
            'points_price' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'region_id' => 'required|exists:regions,id',
            'point_id' => 'required|exists:points,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('product_images', 'public');
        }

        $product->update($data);

        return redirect()->route('product.show', $product->id)
            ->with('success', 'Product updated successfully.');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')
            ->with('success', 'Product deleted successfully.');
    }
    public function destroy($id)
    {
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('product.index')->with('success', 'Producto eliminado exitosamente');
    }
    public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();
    $regions = Region::all();
    $points = Point::all();

    return view('product.edit', compact('product', 'categories', 'regions', 'points'));
}

}
