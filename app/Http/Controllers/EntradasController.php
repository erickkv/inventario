<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Articulo;
use Illuminate\Http\Request;

class EntradasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entradas = Entrada::orderBy('updated_at', 'asc')->get();
        $articulos = Articulo::orderBy('nombre', 'asc')->get();
        return view('entradas.index')->with(compact('entradas', 'articulos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $entrada = Entrada::find($id);
        return view('entradas.show')->with('entrada', $entrada);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
