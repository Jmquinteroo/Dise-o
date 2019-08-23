<?php

namespace App\Http\Controllers\tiquete;

use App\Models\Tiquete;
use App\Models\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Admin_Tiquetes extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Tiquete $tiquete)
    {
        //
    }

    public function edit(Tiquete $tiquete)
    {
        //
    }

    public function update(Request $request, Tiquete $tiquete)
    {
        //
    }

    public function destroy(Tiquete $tiquete)
    {
        //
    }
    public function mostrar_pago(Tiquete $tiquete)
    {if (Auth::user()) {
        return view('tiquetes.pago', compact('tiquete'));
    }
    }
    public function pagar(Request $request, Tiquete $tiquete)
    {if (Auth::user()) {

        $fecha_hoy = date('Y-m-d', strtotime('0 days'));

        if ($tiquete->fecha_limite<$fecha_hoy){
            $request->validate([
                'tipo_tarjeta'=>array('required','regex:/(debito|credito)/u'),
                'numero_tarjeta'=>'required|integer|digits_between:16,16',
                'cedula'=>'required|integer|digits_between:6,12',
            ]);

            $id_tiquete = $tiquete->id;

            DB::table('tiquetes')->where('id',$id_tiquete)
                ->update(['estado' =>'pagado',
                    'fecha_limite' => NULL]);
            return view('tiquetes.pago', compact('tiquete'))
                ->with('Exito','Pago realizado exitosamente');
        }

        else{

            return view('tiquetes.pago', compact('tiquete'))
                ->with('Error','El tiempo límite de pago ha caducado');
        }


    }
    }

    public function reservar(Evento $evento,$precios)
    {
        if (Auth::check()) {

            /**
             * Busca los tiquetes disponibles, para el evento y precio seleccionados.
             */

            $tiquete = DB::table('tiquetes')
                ->where('evento_id', $evento->id)
                ->where('precio', $precios)
                ->where('estado', 'disponible')
                ->first();

            /**
             * Verifica que la búsqueda haya encontrado al menos un tiquete disponible.
             */


            if (isset($tiquete)) {

                /**
                 * Guarda el id del tiquete y del usuario para hacer los cambios pertinentes en la base de datos
                 * Crea la fecha límite de pago
                 */

                $id_tiquete = $tiquete->id;
                $user_id = Auth::id();
                $fecha = date('Y-m-d', strtotime('+2 days'));

                DB::table('tiquetes')->where('id',$id_tiquete)
                    ->update(['estado' =>'reservado',
                        'user_id' => $user_id,
                        'fecha_limite' => $fecha]);

                return view('tiquetes.reservar_tiquete',['evento' => $evento, 'tiquete'=>$tiquete])
                    ->with('Exito', 'Tiquete reservado exitosamente. Tiempo límite de pago: 2 días');

            } else {

                return redirect()->route('eventos.index')
                    ->with('Error', 'No hay tiquetes disponibles para reservar');

            }
        }
    }
}
