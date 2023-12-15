@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>GESTION DE PRODUCTOS</h1>
@stop

@section('content')
    <p>Ingrese la información de los productos</p>

    @php
        if (session()) {
            if (session('message')=='ok') {
                echo '<x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Done" dismissable>
                    Registro guardado exitosamente!
                </x-adminlte-alert>';
            }
        }
    @endphp

    <div class="card">
        <div class="card-body">
            <form action="{{ route('producto.store') }}" method="post">
                @csrf
                <x-adminlte-input type="text" name="nombre_producto" label="NOMBRE DEL PRODUCTO" placeholder="Ingrese el nombre del producto" label-class="text-lightblue" value="{{ old('nombre_producto') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-shopping-cart text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="text" name="descripcion_producto" label="Descripción" placeholder="Ingrese una descripción" label-class="text-lightblue" value="{{ old('descripcion_producto') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-info text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="text" name="precio" label="Precio" placeholder="Ingrese el precio" label-class="text-lightblue" value="{{ old('precio') }}">
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
    <script> console.log('Hi!'); </script>
@stop
