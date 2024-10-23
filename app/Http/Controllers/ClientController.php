<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        
        return view('client.index');
    }

    public function indexcreate(){
        
        return view('client.create');
    }

    public function indexshow()
    {
        $courses = Client::all();

        return view('client.show', ['client' => $courses]);
    }
    public function indexupdate($id)
    {
        $course = Client::findOrFail($id);
        return view('client.update', ['client' => $course]);
    }

    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'description' => 'required|string',
            'credits' => 'required|text',
            'id_instructors' => 'required|integer',
        ]);
        $courses = Client::create($request->all());

        return redirect()->route('client.show');
    }

     public function update(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:clients,email,' . $id,
            'phone' => 'required|string',
            'address' => 'required|string',
            'region' => 'required|string',
        ]);

        $students = Client::findOrFail($id);
        $students->update([
           'name' => $request->name,
           'last_name' => $request->last_name,
           'email' => $request->email,
           'phone' => $request->phone,
           'address' => $request->address,
           'region' => $request->region,
        ]);

        return redirect()->route('client.show', $id);
    }

    public function delete($id)
    {
        $courses = Client::findOrFail($id);
        $courses->delete();

        return redirect()->route('client.show');
    }
}

