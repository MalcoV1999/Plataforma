<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::all();
        return view('purchase.index', ['purchases' => $purchases]);
    }

    public function indexcreate()
    {
        return view('purchase.create');
    }

    
    public function show($id)
    {
        $purchase = Purchase::findOrFail($id);
        return view('purchase.show', ['purchase' => $purchase]);
    }

    public function indexupdate($id)
    {
        $purchase = Purchase::findOrFail($id);
        return view('purchase.update', ['purchase' => $purchase]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'points_used' => 'nullable|integer',
            'date' => 'required|date',
        ]);

        $purchase = Purchase::create($request->all());

        
        return redirect()->route('purchase.show', $purchase->id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'points_used' => 'nullable|integer',
            'date' => 'required|date',
        ]);

        $purchase = Purchase::findOrFail($id);
        $purchase->update($request->all());

       
        return redirect()->route('purchase.show', $id);
    }

    public function delete($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();

        return redirect()->route('purchase.index');
    }
}
