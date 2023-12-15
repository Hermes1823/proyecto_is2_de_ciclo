@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>LISTADO DE PRODUCTOS</h1>
@stop

@section('content')
    <p>Bienvenido al listado de productos.</p>
    <div class="card">
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = ['ID', 'Nombre', ['label' => 'Descripción', 'width' => 40], 'Precio', 'Categoría', ['label' => 'Acciones', 'no-export' => true, 'width' => 10]];

                $btnEdit = '<button type="submit" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>';

                $config = [
                    'language' => [
                        'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                    ],
                ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table2" :heads="$heads" :config="$config">
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre_producto }}</td>
                        <td>{{ $producto->descripcion_producto }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->categoria->nombre_categoria }}</td>
                        <td>
                            <a href="{{ route('producto.edit', $producto) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>

                            <form style='display: inline' action="{{ route('producto.destroy', $producto) }}" method="post"
                                class="forEliminar">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form>

                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.forEliminar').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "¿Está seguro?",
                    text: "Se procederá a eliminar un registro.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminarlo."
                }).then((result) => {
                    if (result.isConfirmed) {
                        if(result.isConfirmed){
                            this.submit();
                        }
                    }
                });
            })
        })
    </script>
@stop

