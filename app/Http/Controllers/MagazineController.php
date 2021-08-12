<?php

namespace App\Http\Controllers;

use App\Magazine;
use Illuminate\Http\Request;
use voku\helper\ASCII;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magazines = Magazine::all();
        return response($magazines->toJson(), 200);
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
        $magazine = new Magazine();
        $magazine->titulo = $request->input('titulo');
        $magazine->periodicidad = $request->input('periodicidad');
        $magazine->tipo = $request->input('tipo');
        $magazine->save();

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
        $magazine = Magazine::find($id);

        return response($magazine->toJson(), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $magazine = Magazine::find($id);
        return response($magazine->toJson(), 200);
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
        $magazine = Magazine::find($id);

        $magazine->titulo = $request->input('titulo');
        $magazine->periodicidad = $request->input('periodicidad');
        $magazine->tipo = $request->input('tipo');
        $magazine->save();

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
        $magazine = Magazine::find($id);
        $magazine->delete();

        return response()->json(["resultado" => "Datos Eliminados"], 202);

    }
}
