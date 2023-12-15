@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>GESTION DE PRODUCTOS</h1>
@stop

@section('content')
    <p>Ingrese la información de los productos</p>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('producto.update', $producto) }}" method="post">
                @csrf
                @method('PUT')
                <x-adminlte-input type="text" name="nombre_producto" label="NOMBRE DEL PRODUCTO" label-class="text-lightblue" value="{{ $producto->nombre_producto }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="text" name="descripcion_producto" label="Descripción" label-class="text-lightblue" value="{{ $producto->descripcion_producto }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="number" name="precio" label="Precio" label-class="text-lightblue" value="{{ $producto->precio }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-dollar-sign text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-select name="categoria_id" label="Categoría" label-class="text-lightblue">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>
                    @endforeach
                </x-adminlte-select>

                <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save"/>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @if (session("message"))
        <script>
            $(document).ready(function(){
                let mensaje = "{{ session('message') }}";
                swal.fire({
                    'title': 'Resultado',
                    'text': mensaje,
                    'icon': 'success'
                })
            })
        </script>
    @endif
@stop
