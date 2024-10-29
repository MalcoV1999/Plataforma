<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transaction.index', ['transactions' => $transactions]);
    }

    public function indexcreate()
    {
        return view('transaction.create');
    }

    
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transaction.show', ['transaction' => $transaction]);
    }

    public function indexupdate($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transaction.update', ['transaction' => $transaction]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'point_id' => 'required|exists:points,id', 
            'product_id' => 'required|exists:products,id', 
            'amount_used' => 'required|integer|min:1',
        ]);

        $transaction = Transaction::create($request->all());

     
        return redirect()->route('transaction.show', $transaction->id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'point_id' => 'required|exists:points,id',
            'product_id' => 'required|exists:products,id',
            'amount_used' => 'required|integer|min:1',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->all());

     
        return redirect()->route('transaction.show', $id);
    }

    public function delete($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

     
        return redirect()->route('transaction.index');
    }
}
