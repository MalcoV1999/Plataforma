<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::all();
        return view('region.index', ['regions' => $regions]);
    }

    public function create()
    {
        return view('region.create');
    }

    public function destroy($id)
    {
        $region = Region::findOrFail($id);
        $region->delete();

        return redirect()->route('region.index')->with('success', 'Región eliminada exitosamente');
    }

    public function show($id)
    {
        $region = Region::findOrFail($id);
        return view('region.show', ['region' => $region]);
    }

    public function indexupdate($id)
    {
        $region = Region::findOrFail($id);
        return view('region.update', ['region' => $region]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'nullable|boolean',
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status') ? true : false; // Manejo del checkbox

        Region::create($data);

        return redirect()->route('region.index')->with('success', 'Región creada exitosamente');
    }

    public function edit($id)
    {
        $region = Region::findOrFail($id);
        return view('region.edit', compact('region'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'nullable|boolean',
        ]);

        $region = Region::findOrFail($id);
        $data = $request->all();
        $data['status'] = $request->has('status') ? true : false; // Manejo del checkbox

        $region->update($data);

        return redirect()->route('region.show', $id)->with('success', 'Región actualizada exitosamente');
    }

    public function delete($id)
    {
        $region = Region::findOrFail($id);
        $region->delete();

        return redirect()->route('region.index')->with('success', 'Región eliminada exitosamente');
    }
}
