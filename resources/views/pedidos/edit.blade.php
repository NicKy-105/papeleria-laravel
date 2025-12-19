@extends('layouts.app')

@section('titulo', 'Editar Pedido')

@section('contenido')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Editar Pedido</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pedidos.update', $pedido) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Producto *</label>
                            <input type="text"
                                   name="producto"
                                   class="form-control @error('producto') is-invalid @enderror"
                                   value="{{ old('producto', $pedido->producto) }}"
                                   required>
                            @error('producto')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nombre del Cliente *</label>
                            <input type="text"
                                   name="nomCliente"
                                   class="form-control @error('nomCliente') is-invalid @enderror"
                                   value="{{ old('nomCliente', $pedido->nomCliente) }}"
                                   required>
                            @error('nomCliente')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Teléfono *</label>
                            <input type="text"
                                   name="telefono"
                                   class="form-control @error('telefono') is-invalid @enderror"
                                   value="{{ old('telefono', $pedido->telefono) }}"
                                   maxlength="10"
                                   required>
                            @error('telefono')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Estado del Pedido *</label>
                            <select name="estado" class="form-select @error('estado') is-invalid @enderror" required>
                                <option value="Solicitado al proveedor" {{ old('estado', $pedido->estado) == 'Solicitado al proveedor' ? 'selected' : '' }}>
                                    Solicitado al proveedor
                                </option>
                                <option value="Producto llegó" {{ old('estado', $pedido->estado) == 'Producto llegó' ? 'selected' : '' }}>
                                    Producto llegó
                                </option>
                                <option value="Cliente avisado" {{ old('estado', $pedido->estado) == 'Cliente avisado' ? 'selected' : '' }}>
                                    Cliente avisado
                                </option>
                                <option value="Pedido entregado" {{ old('estado', $pedido->estado) == 'Pedido entregado' ? 'selected' : '' }}>
                                    Pedido entregado
                                </option>
                            </select>
                            @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fecha del Pedido *</label>
                            <input type="datetime-local"
                                   name="fechaPedido"
                                   class="form-control @error('fechaPedido') is-invalid @enderror"
                                   value="{{ old('fechaPedido', \Carbon\Carbon::parse($pedido->fechaPedido)->format('Y-m-d\TH:i')) }}"
                                   required>
                            <small class="text-muted">Puedes corregir la fecha si te equivocaste al registrar</small>
                            @error('fechaPedido')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="alert alert-info">
                            <strong>Pedido registrado:</strong> {{ \Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y H:i') }}
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
