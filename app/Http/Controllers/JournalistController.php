<?php

namespace App\Http\Controllers;

use App\Journalist;
use Illuminate\Http\Request;

class JournalistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $journalists = Journalist::all();
        return response($journalists->toJson(), 200);
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
        $journalist = new Journalist();
        $journalist->nombre = $request->input('nombre');
        $journalist->apellido1 = $request->input('apellido1');
        $journalist->apellido2 = $request->input('apellido2');
        $journalist->telefono = $request->input('telefono');
        $journalist->especialidad = $request->input('especialidad');
        $journalist->save();


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
        $journalist = Journalist::find($id);

        return response($journalist->toJson(), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $journalist = Journalist::find($id);

        return response($journalist->toJson(), 200);
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
        $journalist = Journalist::find($id);

        $journalist->nombre = $request->input('nombre');
        $journalist->apellido1 = $request->input('apellido1');
        $journalist->apellido2 = $request->input('apellido2');
        $journalist->telefono = $request->input('telefono');
        $journalist->especialidad = $request->input('especialidad');
        $journalist->update();

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
        $journalist = Journalist::find($id);
        $journalist->delete();

        // return redirect('/journalists');
        return response()->json(["resultado" => "Datos Eliminados"], 202);
    }
}
