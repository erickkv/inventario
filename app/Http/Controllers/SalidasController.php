<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Salida;
use Illuminate\Http\Request;

class SalidasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salidas = Salida::orderBy('updated_at', 'asc')->get();
        return view('salidas.index')->with('salidas', $salidas);
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
        $salida = Salida::find($id);
        return view('salidas.show')->with('salida', $salida);
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
