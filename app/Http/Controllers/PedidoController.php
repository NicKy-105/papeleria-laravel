<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        return view('pedidos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto' => 'required|string|max:100',
            'nomCliente' => 'required|regex:/^[a-záéíóúñüA-ZÁÉÍÓÚÑÜ\s\']+$/u|max:100',
            'telefono' => 'required|regex:/^[0-9]{10}$/|max:10',
            'estado' => 'required|string|max:50'
        ], [
            'nomCliente.required' => 'El nombre del cliente es obligatorio',
            'nomCliente.regex' => 'El nombre solo puede contener letras',
            'telefono.required' => 'El teléfono es obligatorio',
            'telefono.regex' => 'El teléfono debe contener exactamente 10 dígitos numéricos',
            'producto.required' => 'El producto es obligatorio',
            'estado.required' => 'Debe seleccionar un estado'
        ]);

        Pedido::create($request->all());
        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido registrado exitosamente');

    }

    public function show(Pedido $pedido)
    {
        return view('pedidos.show', compact('pedido'));
    }

    public function edit(Pedido $pedido)
    {
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        $request->validate([
            'producto' => 'required|string|max:100',
            'nomCliente' => 'required|regex:/^[a-záéíóúñüA-ZÁÉÍÓÚÑÜ\s\']+$/u|max:100',
            'telefono' => 'required|regex:/^[0-9]{10}$/|max:10',
            'estado' => 'required|string|max:50',
            'fechaPedido' => 'required|date'
        ], [
            'nomCliente.required' => 'El nombre del cliente es obligatorio',
            'nomCliente.regex' => 'El nombre solo puede contener letras',
            'telefono.required' => 'El teléfono es obligatorio',
            'telefono.regex' => 'El teléfono debe contener exactamente 10 dígitos numéricos',
            'producto.required' => 'El producto es obligatorio',
            'estado.required' => 'Debe seleccionar un estado',
            'fechaPedido.required' => 'La fecha del pedido es obligatoria',
            'fechaPedido.date' => 'La fecha del pedido no es válida'
        ]);


        $pedido->update($request->all());
        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido actualizado exitosamente');
    }

    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido eliminado exitosamente');
    }
}
