
@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('preguntas.create')}}" class="btn btn-primary">Crear pregunta</a>
</div>

@foreach ($preguntas as $pregunta)
<div class="container mt-4">
    <div class="card flex shadow">
        <div class="p-5 width-70">
            <h5 class="card-text">creador {{$pregunta->name}}</h5>
            <h3 class="card-title">{{$pregunta->pregunta}}</h3>
            <h6 class="card-text ">Fecha de creación {{$pregunta->created_at}}</h6>
            <a href="{{route('preguntas.show', $pregunta->id)}}">Ver respuestas</a>
        </div>
    </div>
</div>
@endforeach
@endsection

<style>
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