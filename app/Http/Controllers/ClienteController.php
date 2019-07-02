<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    public function index() {
        $clientes = Cliente::all();
        $total = Cliente::all()->count();
        return view('list-clientes', compact('clientes', 'total'));
    }

    public function create() {
        return view('include-cliente');
    }

    public function store(Request $request) {
        $client = new Cliente;
        $client->nome = $request->nome;
        $client->telefone = $request->telefone;
        $client->email = $request->email;
        $client->cidade = $request->cidade;
        $client->agencia = $request->agencia;
        $client->tipo_aplicacao = $request->tipo_aplicacao;
        $client->save();
        return redirect()->route('client.index')->with('message', 'Cliente criado com sucesso!');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $client = Cliente::find($id);
        return view('alter-cliente',['client'=>$client]);
    }

    public function update(Request $request, $id) {
        $client = Cliente::findOrFail($id); 
        $client->nome = $request->nome;
        $client->telefone = $request->telefone;
        $client->email = $request->email;
        $client->cidade = $request->cidade;
        $client->agencia = $request->agencia;
        $client->tipo_aplicacao = $request->tipo_aplicacao;
        $client->save();
        return redirect()->route('client.index')->with('message', 'Cliente alterado com sucesso!');
    }

    public function destroy($id) {
        $client = Cliente::findOrFail($id);
        $client->delete();
        return redirect()->route('client.index')->with('message', 'Cliente excluído com sucesso!');
    }
}
