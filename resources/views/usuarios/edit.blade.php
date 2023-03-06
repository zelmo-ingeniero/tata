@extends('layouts/plantilla')
@section('titulo','Actualizar datos')
@section('contenido')
<div class="col-5 mx-auto border border-5 rounded-3" style="padding:30px">
<form method="POST" action="{{ url('usuarios/'.$u->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nombres</label>
        <input type="text" class="form-control @error('nombres') no-es-valido @enderror" name="nombres" value="{{ old('nombres',$u->nombreCompletoUsr) }}">
        @error('nombres')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha de nacimiento</label>
        <input type="date" class="form-control @error('fechaNacimiento') no-es-valido @enderror" min="1922-01-01" max="2004-12-31" name="fechaNacimiento" value="{{ old('fechaNacimiento',$u->fechaNacimientoUsr) }}">
        @error('fechaNacimiento')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Nombre de usuario</label>
        <input type="text" class="form-control @error('nicknameUsr') no-es-valido @enderror" name="nicknameUsr" value="{{ old('nicknameUsr',$v->name) }}">
        @error('nicknameUsr')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Contraseña nueva</label>
        <input type="password" class="form-control @error('contrasena') no-es-valido @enderror" name="contrasena" placeholder="No obligatorio">
        @error('contrasena')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Confirmar contraseña</label>
        <input type="password" class="form-control @error('contrasena_confirmation') no-es-valido @enderror" name="contrasena_confirmation" placeholder="No obligatorio">
        @error('contrasena_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div style="margin-left:auto; margin-top:50px; width:70%">
        <a class="btn btn-danger fw-bold" href="{{ url('home') }}" style="margin:5px">CANCELAR</a>
        <button type="submit" class="btn btn-primary fw-bold" style="margin:5px">CONFIRMAR</button>
    </div>
</form>
</div>
@endsection