@extends('layouts/plantilla')
@section('titulo', 'Datos del usuario')
@section('contenido')
<div class="col-4 mx-auto border border-5 rounded-3" style="padding:30px">
    <div class="mb-3">
        <label class="form-label">Nombres</label>
        <div class="bg-light bg-gradient p-2 border rounded-3">{{ $u->nombreCompletoUsr }}</div>
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha de nacimiento</label>
        <div class="bg-light bg-gradient p-2 border rounded-3">{{ $f }}</div>
        <!--setlocale(LC_TIME,"es_ES"); }}
            {{ strftime("%A %e de %B del %Y", strtotime( date($u->fechaNacimientoUsr) )) }}-->
    </div>
    <div class="mb-3">
        <label class="form-label">Nombre de usuario</label>
        <div class="bg-light bg-gradient p-2 border rounded-3">{{ $v->name }}</div>
    </div>
    <div class="mb-3">
        <label class="form-label">Correo electronico</label>
        <div class="bg-light bg-gradient p-2 border rounded-3">{{ $v->email }}</div>
    </div>
    <div style="margin-top:50px">
        <a class="btn btn-success  fw-bold" href="{{ url('home') }}" style="width:100%">VOLVER</a>
    </div>  
</div>
@endsection