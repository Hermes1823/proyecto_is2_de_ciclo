@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>LISTADO DE OFERTAS</h1>
@stop

@section('content')
    <p>Bienvenido al listado de ofertas.</p>
    <div class="card">
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = ['ID', 'Producto', 'Porcentaje Descuento', 'Fecha Inicio', 'Fecha Fin', ['label' => 'Acciones', 'no-export' => true, 'width' => 10]];

                $config = [
                    'language' => [
                        'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                    ],
                ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table2" :heads="$heads" :config="$config">
                @foreach ($ofertas as $oferta)
                    <tr>
                        <td>{{ $oferta->id }}</td>
                        <td>{{ $oferta->producto->nombre_producto }}</td>
                        <td>{{ $oferta->porcentaje_descuento }}</td>
                        <td>{{ $oferta->fecha_inicio }}</td>
                        <td>{{ $oferta->fecha_fin }}</td>
                        <td>
                            @role('Administrador de Marketing')
                            <a href="{{ route('oferta.edit', $oferta) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            @endrole
                            <form style='display: inline' action="{{ route('oferta.destroy', $oferta) }}" method="post" class="forEliminar">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
@stop


