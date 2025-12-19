@extends('layouts.app')

@section('titulo', 'Pedidos Especiales')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Pedidos Especiales</h1>
        <a href="{{ route('pedidos.create') }}" class="btn btn-primary">
            + Nuevo Pedido
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
            <tr>
                <th>Producto</th>
                <th>Cliente</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th>Fecha del Pedido</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($pedidos as $pedido)
                <tr>
                    <td><strong>{{ $pedido->producto }}</strong></td>
                    <td>{{ $pedido->nomCliente }}</td>
                    <td>{{ $pedido->telefono }}</td>
                    <td>
                        @if($pedido->estado == 'Solicitado al proveedor')
                            <span class="badge bg-warning text-dark">{{ $pedido->estado }}</span>
                        @elseif($pedido->estado == 'Producto llegó')
                            <span class="badge bg-info">{{ $pedido->estado }}</span>
                        @elseif($pedido->estado == 'Cliente avisado')
                            <span class="badge bg-primary">{{ $pedido->estado }}</span>
                        @else
                            <span class="badge bg-success">{{ $pedido->estado }}</span>
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($pedido->fechaPedido)->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('pedidos.edit', $pedido) }}"
                           class="btn btn-sm btn-warning">
                            Editar
                        </a>
                        <form action="{{ route('pedidos.destroy', $pedido) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Seguro que quieres eliminar este pedido?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        No hay pedidos registrados
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
