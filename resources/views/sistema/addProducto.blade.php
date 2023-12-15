@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>GESTION DE PRODUCTOS</h1>
@stop

@section('content')
    <p>Ingrese la informacion del producto</p>

    <x-adminlte-input name="iUser" label="User" placeholder="username" label-class="text-lightblue">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
