@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>LISTADO DE CATEGORIAS</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <div class="card">
        @role('Gerente de Almacen')
            <div class="card-header">
                <a href="{{route('categoria.create')}}" class="btn btn-primary float-right mt-2 mr-2" >
                    Nuevo
                </a>
            </div>
        @endrole
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = ['ID', 'Nombre', ['label' => 'Descripcion', 'width' => 40], ['label' => 'Acciones', 'no-export' => true, 'width' => 10]];

                $btnEdit ='';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </button>';

                $config = [
                    'language' => [
                        'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                    ],
                ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre_categoria }}</td>
                        <td>{{ $categoria->descripcion_categoria }}</td>
                        <td>
                            <a href="{{route('categoria.edit',$categoria)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            @role('Gerente de Almacen')
                            <form style='display: inline' action="{{ route('categoria.destroy', $categoria) }}" method="post"
                                class="forEliminar">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form>
                            @endrole

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
                                title: "Esta usted seguro?",
                                text: "Se procedera a eliminar un registro!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Yes, delete it!"
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
