<?php

namespace App\Http\Controllers\lugar;

use App\Models\Lugar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class Admin_Lugares extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lugares=Lugar::all();
        return view('lugares.index',compact('lugares'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::user() -> Hasrole('admin')) {
        $lugares=Lugar::all();
        return view('lugares.create',compact('lugares'));


    }
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
            'nombre'=>'required|string|unique:lugares',
            'capacidad'=>'required|integer',
            'tipo_lugar'=>'required|string|exists:lugares',
            'direccion'=>'required|string',
            'barrio'=>'required|string',
            'sectores'=>'required|integer',
        ]);

        $input = (object)$request;
        $lugar = new Lugar();
        $lugar->nombre = $input->nombre;
        $lugar->capacidad = $input->capacidad;
        $lugar->tipo_lugar=$input->tipo_lugar;
        $lugar->direccion = $input->direccion;
        $lugar->barrio = $input->barrio;
        $lugar->sectores = $input->sectores;
        $lugar->save();
        $lugar = new Lugar();

//        $lugar->name=$request->name;
//dd($lugar);
        return redirect()->route('lugares.index')
            ->with('Exito','Lugar creado exitosamente');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lugar $id)
    {
        //
        if (Auth::user() -> Hasrole('admin')) {
        $lugar=Lugar::find($id);
        return $lugar;
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user() -> Hasrole('admin')) {
        $lugar=Lugar::find($id);

        return view('lugares.edit',compact('lugar'));
        //
    }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $lugar=Lugar::find($id);
        if ($lugar->nombre==$request->nombre){
        $request->validate([
            'nombre'=>'required|string',
            'capacidad'=>'required|integer',
            'direccion'=>'required|string',
            'barrio'=>'required|string',
            'sectores'=>'required|integer',
        ]);
        }else{
            $request->validate([
                'nombre'=>'required|string|unique:lugares',
                'capacidad'=>'required|integer',
                'direccion'=>'required|string',
                'barrio'=>'required|string',
                'sectores'=>'required|integer',
            ]);
        }


        $lugar->nombre = $request->nombre;
        $lugar->capacidad = $request->capacidad;
        $lugar->direccion = $request->direccion;
        $lugar->barrio = $request->barrio;
        $lugar->sectores = $request->sectores;
        $lugar->save();
        return redirect(route('lugares.index'));




        //
        return $request;
    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {

        Lugar::destroy($id);

        return redirect()->route('lugares.index')
            ->with('Exito','Lugar eliminado correctamente');
        //
    }
}
