<?php

namespace App\Http\Controllers\tiquetes;

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

        if (Auth::check()) {
            $user_id = Auth::id();
            $tiquetes=DB::table('tiquetes')
                ->where('estado', 'reservado')
                ->where('user_id', $user_id);
            $tiquetes = $tiquetes->get();



            if (isset($tiquetes)) {

                 $eventos = array();
                 $i=0;


                foreach ($tiquetes as $tiquete){
                    $i=$i+1;
                    $evento_id=$tiquete->evento_id;
                    $evento = DB::table('eventos')
                        ->where('id', $evento_id);
                    $eventos[$i] = $evento->first();
                }
                return view('tiquetes.index',['eventos' => $eventos, 'tiquetes'=>$tiquetes]);
            } else {
                return view('tiquetes.index')
                    ->with('Error', 'No hay tiquetes con pago pendiente');
            }
        }
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
    public function mostrar_pago($tiquete)
    {if (Auth::user()) {
        return view('tiquetes.pago', compact('tiquete'));
    }
    }

    public function mostrar_reserva(Evento $evento, $tiquete)
    {if (Auth::user()) {
        return view('tiquetes.reservar_tiquete', compact('evento','tiquete'));
    }
    }

    /**
     * @param Request $request
     * @param Tiquete $tiquete
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pagar(Request $request)
    {if (Auth::user()) {

        $id_tiquete = $request->input('tiquete');

        $request->validate([
                'tipo_tarjeta'=>array('required','regex:/(debito|credito)/u'),
                'numero_tarjeta'=>'required|integer|digits_between:16,16',
                'cedula'=>'required|integer|digits_between:6,12',

            ]);

            $intento_pago = DB::table('tiquetes')->where('id',$id_tiquete)
                ->where('estado','reservado')
                ->where('user_id',Auth::id())
                ->update(['estado' =>'pagado',
                    'fecha_limite' => NULL]);

            if ($intento_pago) {
                return redirect()->route('tiquetes.mostrar_recibo', ['tiquete' => $id_tiquete])
                ->with('Exito', 'Pago realizado exitosamente');

            }
            else{
                return redirect()->route('tiquetes.mostrar_recibo', ['tiquete' => $id_tiquete])
                    ->with('Error', 'La transacción no fue exitosa');
            }

        }


    }

    public function reservar(Evento $evento,$precios)
    {
        if (Auth::check()) {
            if (auth()->user()->isAdministrator()){
                return view('/welcome');
            }
            else {

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

                    DB::table('tiquetes')->where('id', $id_tiquete)
                        ->update(['estado' => 'reservado',
                            'user_id' => $user_id,
                            'fecha_limite' => $fecha]);

                    return redirect()->route('tiquetes.mostrar_reserva', ['evento' => $evento, 'tiquete' => $id_tiquete])
                        ->with('Exito', 'Tiquete reservado exitosamente. Tiempo límite de pago: 2 días');

                } else {

                    return redirect()->route('eventos.index')
                        ->with('Error', 'No hay tiquetes disponibles para reservar');

                }
            }
        }
    }
        public function cancelar($tiquete_id)
    {
        if (Auth::check()) {

            /**
             * Busca los tiquetes disponibles, para el evento y precio seleccionados.
             */
            if (auth()->user()->isAdministrator()){
                return view('/welcome');
            }
            else{
                $tiquete = DB::table('tiquetes')
                    ->where('id', $tiquete_id)
                    ->where('user_id', Auth::id())
                    ->where('estado', 'reservado')
                    ->first();

                /**
                 * Verifica que la búsqueda haya encontrado al menos un tiquete disponible.
                 */


                if (isset($tiquete)) {


                    DB::table('tiquetes')->where('id',$tiquete_id)
                        ->update(['estado' =>'disponible',
                            'user_id' => NULL,
                            'fecha_limite' => NULL]);

                    return redirect()->route('tiquetes.index')
                        ->with('Exito', 'Tiquete cancelado exitosamente.');

                } else {

                    return redirect()->route('tiquetes.index')
                        ->with('Error', 'Este tiquete no se pudo cancelar');

                }
            }

        }
    }
}
