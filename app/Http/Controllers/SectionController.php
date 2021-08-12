<?php

namespace App\Http\Controllers;

use App\Magazine;
use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$magazine = Magazine::all();
        $section = Section::all();
        return response($section->toJson(), 200);
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
        $section = new Section();
        $section->numero_registro_id = $request->input('numero_registro_id');
        $section->titulo = $request->input('titulo');
        $section->extension = $request->input('extension');
        $section->save();

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
        $section = Section::find($id);
        return response($section->toJson(), 200);
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
        $section = Section::find($id);
        return response($section->toJson(), 200);
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
        $section = Section::find($id);

        $section->numero_registro_id = $request->input('numero_registro_id');
        $section->titulo = $request->input('titulo');
        $section->extension = $request->input('extension');
        $section->save();

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
        $section = Section::find($id);
        $section->delete();

        return response()->json(["resultado" => "Datos Eliminados"], 202);
    }
}
