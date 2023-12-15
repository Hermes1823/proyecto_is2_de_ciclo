@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>GESTIÓN DE OFERTAS</h1>
@stop

@section('content')
    <p>Ingrese la información de la oferta</p>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('oferta.store') }}" method="post">
                @csrf

                <x-adminlte-select name="producto_id" label="Producto" label-class="text-lightblue">
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre_producto }}</option>
                    @endforeach
                </x-adminlte-select>

                <x-adminlte-input type="number" name="porcentaje_descuento" label="Porcentaje de descuento" placeholder="Ingrese el porcentaje" label-class="text-lightblue" value="{{ old('porcentaje_descuento') }}">
                    <x-slot name="appendSlot">
                        <div class="input-group-text">
                            %
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="datetime-local" name="fecha_inicio" label="Fecha de inicio" label-class="text-lightblue" value="{{ old('fecha_inicio') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-calendar-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="datetime-local" name="fecha_fin" label="Fecha de fin" label-class="text-lightblue" value="{{ old('fecha_fin') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-calendar-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

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
