<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Http\Request;
use App\Models\Producto;


class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ofertas = Oferta::all();
        $oferta = $ofertas->first(); // Obtén la primera oferta de la colección
    
        return view('sistema.oferta.index', compact('ofertas', 'oferta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $productos = Producto::all();
        return view('sistema.oferta.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'porcentaje_descuento' => 'required|numeric|min:0',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);
    
        $oferta = new Oferta();
        $oferta->producto_id = $request->input('producto_id');
        $oferta->porcentaje_descuento = $request->input('porcentaje_descuento');
        $oferta->fecha_inicio = $request->input('fecha_inicio');
        $oferta->fecha_fin = $request->input('fecha_fin');
    
        $oferta->save();
    
        return back()->with('message', 'Oferta creada correctamente');
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
    $oferta = Oferta::find($id);
    
    // Recuperar información del producto asociado a la oferta
    $producto = $oferta->producto;

    return view('sistema.oferta.edit', compact('oferta', 'producto'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $oferta = Oferta::find($id);

        

        $oferta->porcentaje_descuento = $request->input('porcentaje_descuento');
        $oferta->fecha_inicio = $request->input('fecha_inicio');
        $oferta->fecha_fin = $request->input('fecha_fin');

        $oferta->save();

        return back()->with('message', 'Oferta actualizada correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $oferta = Oferta::find($id);
        $oferta->delete();

        return back();
    }
}
