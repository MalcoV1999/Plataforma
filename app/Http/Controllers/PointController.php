<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function index()
    {
        $points = Point::all();
        return view('point.index', ['points' => $points]);
    }

    public function create()
    {
        return view('point.create');
    }



    public function show($id)
    {
        $point = Point::findOrFail($id);
        return view('point.show', ['point' => $point]);
    }

    public function indexupdate($id)
    {
        $point = Point::findOrFail($id);
        return view('point.update', ['point' => $point]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|integer',
            'load_date' => 'required|date',
        ]);

        $point = Point::create($request->only(['user_id', 'amount', 'load_date']));

        return redirect()->route('point.show', $point->id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|integer',
            'load_date' => 'required|date',
        ]);

        $point = Point::findOrFail($id);
        $point->update($request->only(['user_id', 'amount', 'load_date']));

        return redirect()->route('point.show', $id);
    }
    public function destroy($id)
    {
    $point = Point::findOrFail($id);
    $point->delete();

    return redirect()->route('point.index')->with('success', 'Punto eliminado exitosamente');
    }
    
}
