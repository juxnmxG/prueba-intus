@extends('layouts.app')
@section('content')
<form class="container" action="{{ route('preguntas.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">
            <h1>Escribe tu Pregunta</h1>
        </label>
        <textarea type="text" class="form-control" id="pregunta" name="pregunta"></textarea>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
@endsection