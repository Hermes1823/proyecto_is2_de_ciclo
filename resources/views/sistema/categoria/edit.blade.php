@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>GESTION DE CATEGORIAS</h1>
    
@stop

@section('content')
    <p>Ingrese la informacion de las categorias</p>


    <div class="card">
      
        <div class="card-body">
            <form action="{{route('categoria.update', $categoria)}}" method="post">
                @csrf
                @method('PUT')
                <x-adminlte-input type="text" name="nombre_categoria" label="NOMBRE DE LA CATEGORIA"  label-class="text-lightblue" value="{{$categoria->nombre_categoria}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            
                <x-adminlte-input type="text" name="descripcion_categoria" label="Descripcion"  label-class="text-lightblue" value="{{$categoria->descripcion_categoria}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
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
            let mensaje = "{{ session ('message')}}";
            swal.fire({
                'title': 'Resultado',
                'text': mensaje,
                'icon': 'success'
            })
        })
   </script>
   @endif
@stop
