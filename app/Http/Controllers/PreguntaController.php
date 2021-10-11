<?php

namespace App\Http\Controllers;

use App\Pregunta;
use App\respuesta;
use App\User;
use App\voto;
use Illuminate\Http\Request;


class PreguntaController extends Controller
{

    public function index()
    {
        $preguntas = User::join("preguntas", "users.id", "=", "preguntas.user_id")->get();
        return view('preguntas.index', compact('preguntas'));
    }


    public function create()
    {
        return view('preguntas.crear', compact('pregunta'));
    }


    public function store(Request $request)
    {
        $pregunta = new Pregunta();
        $pregunta->user_id = auth()->user()->id;
        $pregunta->pregunta = $request->pregunta;
        $pregunta->save();

        return redirect()->route('preguntas.index')
            ->with('success', 'Pregunta created successfully.');
    }


    public function show($id)
    {
        $pregunta = Pregunta::find($id);
        $user = User::find($pregunta->user_id);
        $respuestas = Respuesta::all()->where('pregunta_id', $id);
        $votos = voto::groupBy('voto')->selectRaw('voto, count(*) as cuantos')->where('pregunta_id', $id)->get();
        return view('preguntas.detalles', compact('pregunta', 'user', 'respuestas', 'votos'));
    }


    public function edit($id)
    {
        $pregunta = Pregunta::find($id);
        return view('pregunta.edit', compact('pregunta'));
    }
    
    public function destroy($id)
    {
        $pregunta = Pregunta::find($id)->delete();

        return redirect()->route('preguntas.index')
            ->with('success', 'Pregunta deleted successfully');
    } 
}
