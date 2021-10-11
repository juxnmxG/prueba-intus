<?php

namespace App\Http\Controllers;

use App\Respuesta;
use Illuminate\Http\Request;

/**
 * Class RespuestaController
 * @package App\Http\Controllers
 */
class RespuestaController extends Controller
{
    public function index()
    {
        $preguntas = Respuesta::all();
        return view('respuestas.index', compact('respuestas'));
    }

    
    public function create()
    {
        return view('respuestas.crear', compact('respuestas'));
    }

    
    public function store(Request $request)
    {
        $respuesta = new Respuesta();
        $respuesta->user_id = auth()->user()->id;
        $respuesta->pregunta_id = $request->pregunta_id; 
        $respuesta->respuesta = $request->respuesta;
        $respuesta->save();
        
        return redirect()->route('preguntas.show', $request->pregunta_id )
            ->with('success', 'Pregunta created successfully.'); 
    }
}
