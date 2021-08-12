<?php

namespace App\Http\Controllers;

use App\Copy;
use App\Magazine;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class CopyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magazines = Magazine::all();
        $copies = Copy::all();
        //$datos = [$magazines,$copies];

        return response($copies->toJson(), 200);
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
        $copy = new Copy();
        $copy->numero_registro_id = $request->input('numero_registro_id');
        $copy->fecha = $request->input('fecha');
        $copy->numero_paginas = $request->input('numero_paginas');
        $copy->numero_ejemplares = $request->input('numero_ejemplares');
        $copy->save();
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
        $copy= Copy::find($id);
        return response($copy->toJson(), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$magazines = Magazine::all();
        $copy = Copy::find($id);
        return response($copy->toJson(), 200);
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

        $copy = Copy::find($id);

        $copy->numero_registro_id = $request->input('numero_registro_id');
        $copy->fecha = $request->input('fecha');
        $copy->numero_paginas = $request->input('numero_paginas');
        $copy->numero_ejemplares = $request->input('numero_ejemplares');
        $copy->save();

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
        $copy = Copy::find($id);
        $copy->delete();
        return response()->json(["resultado" => "Datos Eliminados"], 202);
    }
}
