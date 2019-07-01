<?php

namespace App\Http\Controllers\evento;

use App\Models\Evento;
use App\Models\Lugar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Admin_Eventos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos=Evento::all();
        return view('eventos.index',compact('eventos'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lugares=Lugar::all();
        return view('eventos.create',compact('lugares'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|string',
            'lugar_id'=>'required|integer',
            'fecha'=>'required|date|after:today',
            'hora'=>'required|date_format:H:i',
            'precios'=>'required|integer',
        ]);

        Evento::create($request->all());

        return redirect()->route('eventos.index')
            ->with('Exito','Evento creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        return view('eventos.show',compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        //
    }
}
