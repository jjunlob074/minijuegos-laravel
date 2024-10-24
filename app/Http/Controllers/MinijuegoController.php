<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Minijuego;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class MinijuegoController extends Controller
{
    public function index (request $request) {
        $minijuegos = Minijuego::all();
        return view('welcome', ['minijuegos' => $minijuegos], ['request' => $request]);
    }
    public function simonDice () {
        return view('simondice');
    }
    public function guardarPuntaje(Request $request)
        {
            $puntaje = $request->input('puntaje');
            $user_id = Auth::user()->id;
            if ($user_id != null){
            try {
                DB::beginTransaction();

                DB::table('minijuego_user')->insert(
                    [
                    'minijuego_id' => 1,
                    'user_id' => $user_id,
                    'points' => $puntaje,
                    ]
                );

                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Error al insertar puntaje: ' . $e->getMessage());
            }
          }
        }
    
}
