<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Listar todos los clientes
    public function index()
    {
        $clients = Client::all();
        return view('client.index', ['clients' => $clients]);
    }

    // Mostrar el formulario para crear un nuevo cliente
    public function create()
    {
        return view('client.create');
    }

    // Almacenar un nuevo cliente
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'dni' => 'required|string|unique:clients,dni',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'region' => 'required|string',
        ]);
    
        // Verifica que el usuario esté autenticado
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'Usuario no autenticado.');
        }
    
        $clientData = $request->all();
        $clientData['user_id'] = auth()->id(); // Asignar automáticamente el ID del usuario autenticado
    
        $client = Client::create($clientData);
    
        return redirect()->route('client.show', $client->id)->with('success', 'Cliente creado exitosamente');
    }
    



    // Mostrar un cliente específico
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('client.show', ['client' => $client]);
    }

    // Mostrar el formulario para editar un cliente
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('client.edit', compact('client'));
    }

    // Actualizar un cliente
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'dni' => 'required|string|unique:clients,dni,' . $id,
            'email' => 'required|email|unique:clients,email,' . $id,
            'phone' => 'required|string',
            'address' => 'required|string',
            'region' => 'required|string',
        ]);

        $client = Client::findOrFail($id);
        $client->update($request->all());

        return redirect()->route('client.show', $id)->with('success', 'Cliente actualizado exitosamente');
    }

    // Eliminar un cliente
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('client.index')->with('success', 'Cliente eliminado exitosamente');
    }
}
