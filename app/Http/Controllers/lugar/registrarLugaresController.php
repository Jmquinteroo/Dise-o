<?php

namespace App\Http\Controllers\lugar;

use App\Models\Lugar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;

class registrarLugaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lugares=Lugar::all();
        return view('registrarlugar',compact('lugares'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $input = (object)$request;
        $lugar = new Lugar();
        $lugar->name = $input->name1;
        $lugar->capacidad = $input->capacidad;
        $lugar->direccion = $input->direccion;
        $lugar->barrio = $input->barrio;
        $lugar->sectores = $input->sectores;

        $lugar->save();
        return redirect(route('registrarlugar'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $lugares=Lugar::all();
        $idd=$id;
        return view('layouts.editarlugar',compact('lugares'),compact('idd'));



        return redirect(action('editarlugar'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {


        $lugar=Lugar::find($request->id);
        $lugar->name = $request->name1;
        $lugar->capacidad = $request->capacidad;
        $lugar->direccion = $request->direccion;
        $lugar->barrio = $request->barrio;
        $lugar->sectores = $request->sectores;
        $lugar->save();

        return redirect(route('registrarlugar'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
Lugar::destroy($id);

        return redirect(route('registrarlugar'));
    }
}
