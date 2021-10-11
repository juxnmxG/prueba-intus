
@extends('layouts.app')
@section('content')
@foreach ($preguntas as $pregunta)
<div class="container mt-4">
    <div class="card flex shadow">
        <div class="p-5 width-70">
            <h5 class="card-text">creador {{$pregunta->name}}</h5>
            <h3 class="card-title">{{$pregunta->pregunta}}</h3>
            <h6 class="card-text ">Fecha de creación {{$pregunta->created_at}}</h6>
            <a href="{{route('preguntas.show', $pregunta->id)}}"> Ver respuestas</a>
        </div>
        <div class=" border width-30 p-4">
            <h1 class="card-text">{{}}</h1>
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
@endforeach
@endsection