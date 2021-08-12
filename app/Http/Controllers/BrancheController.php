<?php

namespace App\Http\Controllers;

use App\Branche;
use App\Journalist;
use Illuminate\Http\Request;

class BrancheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branche::all();
        return response($branches->toJson(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* devido a que el create es un formulario y no una vista
        se queda del lado del cliente
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branches = new Branche();
        $branches->direccion = $request->input('direccion');
        $branches->ciudad = $request->input('ciudad');
        $branches->provincia = $request->input('provincia');
        $branches->telefono = $request->input('telefono');
        //$branches->imagen = $request->get('imagen');
        $branches->imagen = 'fhg64';
        $branches->save();

        return response()->json(["resultado" => "Datos Guardados"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branche = Branche::find($id);
        return response($branche->toJson(), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branche = Branche::find($id);
        return response($branche->toJson(), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $branche = Branche::find($id);

        $branche->direccion = $request->input('direccion');
        $branche->ciudad = $request->input('ciudad');
        $branche->provincia = $request->input('provincia');
        $branche->telefono = $request->input('telefono');
        //$branches->imagen = $request->get('imagen');
        $branche->imagen = 'fhg64';

        $branche->save();

        return response()->json(["resultado" => "Datos Actualizados"], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branche = Branche::find($id);
        $branche->delete();

        return response()->json(["resultado" => "Datos Eliminados"], 202);
    }
}
