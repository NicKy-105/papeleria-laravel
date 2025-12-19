@extends('layouts.app')

@section('titulo', 'Registrar Pedido')

@section('contenido')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Registrar Nuevo Pedido</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pedidos.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Producto *</label>
                            <input type="text"
                                   name="producto"
                                   class="form-control @error('producto') is-invalid @enderror"
                                   value="{{ old('producto') }}"
                                   placeholder="Ej: Libro de Cálculo 2, Empastado tesis"
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
                                   value="{{ old('nomCliente') }}"
                                   placeholder="Nombre completo"
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
                                   value="{{ old('telefono') }}"
                                   placeholder="Ej: 0998765432"
                                   maxlength="10"
                                   required>
                            @error('telefono')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Estado del Pedido *</label>
                            <select name="estado" class="form-select @error('estado') is-invalid @enderror" required>
                                <option value="">Seleccione...</option>
                                <option value="Solicitado al proveedor" {{ old('estado') == 'Solicitado al proveedor' ? 'selected' : '' }}>
                                    Solicitado al proveedor
                                </option>
                                <option value="Producto llegó" {{ old('estado') == 'Producto llegó' ? 'selected' : '' }}>
                                    Producto llegó
                                </option>
                                <option value="Cliente avisado" {{ old('estado') == 'Cliente avisado' ? 'selected' : '' }}>
                                    Cliente avisado
                                </option>
                                <option value="Pedido entregado" {{ old('estado') == 'Pedido entregado' ? 'selected' : '' }}>
                                    Pedido entregado
                                </option>
                            </select>
                            @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="alert alert-info">
                            <strong>Nota:</strong> La fecha y hora del pedido se registrarán automáticamente.
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Registrar Pedido
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
