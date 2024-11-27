<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('company.index', ['companies' => $companies]);
    }

    public function create()
    {
        return view('company.create');
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('company.show', ['company' => $company]);
    }

    public function indexupdate($id)
    {
        $company = Company::findOrFail($id);
        return view('company.update', ['company' => $company]);
    }
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('company.index')->with('success', 'Compañia eliminada exitosamente');
    }
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'ruc' => 'required|string|max:11|unique:companies,ruc',
        'logo' => 'nullable|image|max:2048',
        'status' => 'nullable|boolean',
    ]);

    $data = $request->all();
    $data['status'] = $request->has('status') ? true : false; // Manejo de checkbox
    $data['user_id'] = auth()->id(); // Asigna automáticamente el ID del usuario autenticado

    if ($request->hasFile('logo')) {
        $data['logo'] = $request->file('logo')->store('logos', 'public');
    }

    $company = Company::create($data);

    return redirect()->route('company.show', $company->id);
}

public function edit($id)
{
    $company = Company::findOrFail($id);
    return view('company.edit', compact('company'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'ruc' => 'required|string|max:11|unique:companies,ruc,' . $id,
        'logo' => 'nullable|image|max:2048',
        'status' => 'nullable|boolean',
    ]);

    $company = Company::findOrFail($id);

    $data = $request->all();
    $data['status'] = $request->has('status') ? true : false; // Manejo del checkbox

    if ($request->hasFile('logo')) {
        $data['logo'] = $request->file('logo')->store('logos', 'public');
    }

    $company->update($data);

    return redirect()->route('company.show', $id)->with('success', 'Compañía actualizada exitosamente');
}


    public function delete($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('company.index');
    }
}
