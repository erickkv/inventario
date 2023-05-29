<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Salida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalidasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salidas = Salida::orderBy('updated_at', 'desc')->get();
        $articulos = Articulo::orderBy('nombre', 'asc')->get();
        return view('salidas.index')->with(compact('salidas', 'articulos'));
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
        $idArticulo = $request->input('idArticulo');
        $cantidad = $request->input('cantidad');
        $idUsuario = Auth::id();
        $nota = $request->input('nota');

        //crear la nueva entrada
        $salida = new Salida();
        $salida->idArticulo = $idArticulo;
        $salida->cantidad = $cantidad;
        $salida->idUsuario = $idUsuario;
        $salida->nota = $nota;


        //guardar la entrada
        $salida->save();

        //buscar el articulo a modificar cantidad en inventario y guardarlo en variable
        $articuloMod =Articulo::find($idArticulo);

        //modificar cantidad del articulo
        $articuloMod->cantidad =  (number_format($articuloMod->cantidad, 2)) - number_format($cantidad, 2);

        //guardar articulo
        $articuloMod->save();

        $salidas = Salida::orderBy('updated_at', 'asc')->get();

        return view('salidas.table', compact('salidas'));
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
