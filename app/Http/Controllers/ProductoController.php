<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CategoriaController;
use App\Models\Categoria;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = Producto::all();
        return view('sistema.producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('sistema.producto.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'nombre_producto' => 'required|max:75',
            'descripcion_producto' => 'required|max:75',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $producto = new Producto();

        $producto->nombre_producto = $request->input('nombre_producto');
        $producto->descripcion_producto = $request->input('descripcion_producto');
        $producto->precio = $request->input('precio');
        $producto->categoria_id = $request->input('categoria_id');

        $producto->save();

        return back()->with('message', 'ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        return view('sistema.producto.edit', compact('producto', 'categorias'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = Producto::find($id);
    
        $producto->nombre_producto = $request->input('nombre_producto');
        $producto->descripcion_producto = $request->input('descripcion_producto');
        $producto->precio = $request->input('precio');
        $producto->categoria_id = $request->input('categoria_id');
    
        $producto->save();
        
        return back()->with('message', 'Actualizado correctamente');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $producto = Producto::find($id);
    $producto->delete();

    return back();
}
}
