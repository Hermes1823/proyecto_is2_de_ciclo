@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>GESTION DE OFERTAS</h1>
@stop

@section('content')
    <p>Ingrese la información de la oferta</p>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('oferta.update', $oferta) }}" method="post">
                @csrf
                @method('PUT')
                <x-adminlte-input type="number" name="porcentaje_descuento" label="Porcentaje de Descuento" label-class="text-lightblue" value="{{ $oferta->porcentaje_descuento }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-percent text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="datetime-local" name="fecha_inicio" label="Fecha de Inicio" label-class="text-lightblue" value="{{ $oferta->fecha_inicio ? date('Y-m-d\TH:i', strtotime($oferta->fecha_inicio)) : '' }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-calendar-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input type="datetime-local" name="fecha_fin" label="Fecha de Fin" label-class="text-lightblue" value="{{ $oferta->fecha_fin ? date('Y-m-d\TH:i', strtotime($oferta->fecha_fin)) : '' }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-calendar-alt text-lightblue"></i>
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
