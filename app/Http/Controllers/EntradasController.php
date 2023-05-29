<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $idArticulo = $request->input('idArticulo');
        $cantidad = $request->input('cantidad');
        $idUsuario = Auth::id();
        $nota = $request->input('nota');

        //crear la nueva entrada
        $entrada = new Entrada();
        $entrada->idArticulo = $idArticulo;
        $entrada->cantidad = $cantidad;
        $entrada->idUsuario = $idUsuario;
        $entrada->nota = $nota;


        //guardar la entrada
        $entrada->save();

        //buscar el articulo a modificar cantidad en inventario y guardarlo en variable
        $articuloMod =Articulo::find($idArticulo);

        //modificar cantidad del articulo
        $articuloMod->cantidad =  (number_format($articuloMod->cantidad, 2)) + number_format($cantidad, 2);

        //guardar articulo
        $articuloMod->save();

        $entradas = Entrada::orderBy('updated_at', 'asc')->get();

        return view('entradas.table', compact('entradas'));
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
