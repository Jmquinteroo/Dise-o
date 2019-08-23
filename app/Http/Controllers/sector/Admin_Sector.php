<?php

namespace App\Http\Controllers\sector;

use App\Models\Lugar;
use App\Models\Sector;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Admin_Sector extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = (object)$request->input();
        $lugar=Lugar::find( $input->idlugar);
        $request->validate([
            'nombresector'=>'required|array',
            'nombresector.*'=>'string',
            'capacidadsector'=>'required|array',
            'capacidadsector.*'=>'string',

        ]);


        foreach($input->nombresector as $index => $nombre){
            $sector=new Sector();
            $sector->nombresector=$nombre;
            $sector->capacidad = $input->capacidadsector[$index];
            $sector->id_lugar=$lugar->id;
            $sector->save();
        }

        return redirect()->route('lugares.index')
            ->with('Exito','Lugar creado exitosamente');



        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
