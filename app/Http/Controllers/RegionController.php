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

    public function indexcreate()
    {
        return view('region.create');
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

        Region::create($request->all());

        return redirect()->route('region.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'nullable|boolean',
        ]);

        $region = Region::findOrFail($id);
        $region->update($request->all());

        
        return redirect()->route('region.show', $id);
    }

    public function delete($id)
    {
        $region = Region::findOrFail($id);
        $region->delete();

      
        return redirect()->route('region.index');
    }
}
