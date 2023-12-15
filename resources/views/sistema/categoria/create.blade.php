@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>GESTION DE CATEGORIAS</h1>
    
@stop

@section('content')
    <p>Ingrese la informacion de las categorias</p>


    @php
    if (session()) {
        if (session('message')=='ok') {
            # code...
            echo'<x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Done" dismissable>
                registro guardado exitosamente!
            </x-adminlte-alert>';
                            }
    }
    @endphp

    <div class="card">
      
        <div class="card-body">
            <form action="{{route('categoria.store')}}" method="post">
                @csrf
                <x-adminlte-input type="text" name="nombre_categoria" label="NOMBRE DE LA CATEGORIA" placeholder="ingrese el nombre de la categoria" label-class="text-lightblue" value="{{old('nombre_categoria')}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            
                <x-adminlte-input type="text" name="descripcion_categoria" label="Descripcion" placeholder="ingrese una descripcion" label-class="text-lightblue" value="{{old('nombre_categoria')}}">
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
    <script> console.log('Hi!'); </script>
@stop
