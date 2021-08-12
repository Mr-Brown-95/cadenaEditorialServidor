<?php

namespace App\Http\Controllers;

use App\Employ;
use Illuminate\Http\Request;

class EmployController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employs = Employ::all();
        return response($employs->toJson(), 200);
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
        $employs = new Employ();

        $employs->codigoSucursal_id = $request->input('codigoSucursal_id');
        $employs->nif = $request->input('nif');
        $employs->nombre = $request->input('nombre');
        $employs->apellido1 = $request->input('apellido1');
        $employs->apellido2 = $request->input('apellido2');
        $employs->telefono = $request->input('telefono');
        $employs->save();

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
        $employs = Employ::find($id);
        return response($employs->toJson(), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employ = Employ::find($id);
        return response($employ->toJson(), 200);
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
        $employs = Employ::find($id);

        $employs->codigoSucursal_id = $request->input('codigoSucursal_id');
        $employs->nif = $request->input('nif');
        $employs->nombre = $request->input('nombre');
        $employs->apellido1 = $request->input('apellido1');
        $employs->apellido2 = $request->input('apellido2');
        $employs->telefono = $request->input('telefono');
        $employs->save();
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
        $employ = Employ::find($id);
        $employ->delete();
        return response()->json(["resultado" => "Datos Eliminados"], 202);
    }
}
