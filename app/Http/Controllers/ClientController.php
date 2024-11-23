<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('client.index', ['clients' => $clients]);
    }
    public function edit($id)
{
    $client = Client::findOrFail($id);
    return view('client.edit', compact('client'));
}

    public function create()
    {
        return view('client.create');
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('client.show', ['client' => $client]);
    }

    public function destroy($id)
    {
    $client = Client::findOrFail($id);
    $client->delete();

    return redirect()->route('client.index')->with('success', 'Cliente eliminado exitosamente');
    }

    public function indexupdate($id)
    {
        $client = Client::findOrFail($id);
        return view('client.update', ['client' => $client]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'dni' => 'required|string',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'region' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $client = Client::create($request->all());

        return redirect()->route('client.show', $client->id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'dni' => 'required|string',
            'email' => 'required|email|unique:clients,email,' . $id,
            'phone' => 'required|string',
            'address' => 'required|string',
            'region' => 'required|string',
        ]);

        $client = Client::findOrFail($id);
        $client->update($request->all());

        return redirect()->route('client.show', $id);
    }

    public function delete($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('client.index');
    }
}
