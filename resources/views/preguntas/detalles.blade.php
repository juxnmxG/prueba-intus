@extends('layouts.app')
@section('content')
<div class="container ">
    @csrf
    <div class="mb-2 card border p-4 shadow-lg">
        <div>
            <div class="card flex shadow">
                <div class="p-5 width-70">
                    <h5 class="card-text">creador {{$user->name}}</h5>
                    <h3 class="card-title">{{$pregunta->pregunta}}</h3>
                    <h6 class="card-text ">Fecha de creación {{$pregunta->created_at}}</h6>
                </div>
                <div class=" border width-30 p-4">
                    @if(empty($votos[0]))
                    <h1 class="card-text">0</h1>
                    @else
                    <h1 class="card-text">{{$votos[0]->cuantos}}</h1>
                    @endif
                    <h3 class="card-title">Votos</h3>
                    
                    <form class="container" action="{{route('votos.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" name="pregunta_id" value="{{$pregunta->id}}">
                            <button type="submit" class="btn btn-primary mt-4">Votar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card p-4 shadow-lg st">
            <form class="container" action="{{ route('respuestas.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">
                        <h4>Responde a esta pregunta</h4>
                    </label>
                    <input type="hidden" name="pregunta_id" value="{{$pregunta->id}}">
                    <textarea type="text" class="form-control" id="pregunta" name="respuesta"></textarea>
                    <button type="submit" class="btn btn-primary mt-4">Responder</button>
                </div>
            </form>
        </div>
        <div class="mb-4 mt-4">
            <h4>Respuestas</h4>
            <div>
                @foreach($respuestas as $respuesta)
                <div class="border-top p-4">
                    <h6>Creador {{$respuesta->user_id}}</h6>
                    <p>{{$respuesta->respuesta}}</p>
                    <h6>Fecha de creación {{ $respuesta->created_at}}</h6>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .st {
        margin: 60px 0;
        height: 200px;
        position: sticky;
        top: 0;
    }

    .flex {
        display: flex !important;
        flex-direction: row !important;
        justify-content: space-between;
    }

    .width-70 {
        width: 70%;
    }

    .width-30 {
        text-align: center;
        width: 30%;
    }
</style>