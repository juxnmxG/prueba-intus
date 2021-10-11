<?php

namespace App\Http\Controllers;

use App\voto;
use Illuminate\Http\Request;

class VotosController extends Controller
{
    public function store(Request $request)
    {
        $voto = new voto();
        $voto->user_id = auth()->user()->id;
        $voto->pregunta_id = $request->pregunta_id;
        $voto->save();
        return redirect()->route('preguntas.show', $request->pregunta_id)
            ->with('success', 'Pregunta created successfully.');
    }
}
