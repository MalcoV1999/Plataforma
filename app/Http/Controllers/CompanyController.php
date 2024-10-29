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

    public function indexcreate()
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'boolean',
            'logo' => 'nullable|image|max:2048',
            'ruc' => 'required|string|max:11|unique:companies,ruc',
            'user_id' => 'required|exists:users,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $company = Company::create($data);

        return redirect()->route('company.show', $company->id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'boolean',
            'logo' => 'nullable|image|max:2048',
            'ruc' => 'required|string|max:11|unique:companies,ruc,' . $id,
            'user_id' => 'required|exists:users,id',
        ]);

        $company = Company::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $company->update($data);

        return redirect()->route('company.show', $id);
    }

    public function delete($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('company.index');
    }
}
