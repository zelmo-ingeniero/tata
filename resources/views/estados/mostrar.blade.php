@extends('layouts/pantallaCompleta')
@section('titulo',$e->textoStds)
@section("estiloscss")
    <style>
        .progress .progress-bar{
            animation: animacion 30s;
            animation-timing-function: linear;
        }
        @keyframes animacion {
            0% {width: 0%}
            100% {width: 100%}
        }
    </style>
@endsection
@section('cabecera')
    @if($u->id==$a->id)
        <div class="col">
            <h3 class="m-3">Tú</h3>
        </div>
        <div class="col-auto d-flex">
            <h5 class="m-3">{{ $f }}</h5>
            <form method="POST" action="{{ url('estados/'.$e->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-light fw-bold mt-3" style="margin-right:30px">ELIMINAR</button>
            </form>
        </div>     
    @else
        <div class="col me-auto">
            <h3 class="m-3" style="margin-top:25px;margin-left:10%">{{ $u->name }}</h3>
        </div>
        <div class="col-auto ms-auto">
            <h5 class="m-3" style="margin-top:30px;margin-right:5%">{{ $f }}</h5>
        </div>
    @endif
    <div class="progress position-absolute top-0 px-0 mx-0" style="height: 3px;background: transparent">
        <div id="progress-bar" class="progress-bar bg-light" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
@endsection
@section('contenido')

<div class="my-3" style="display: flex;height: 50vmin;max-width: 100%;text-align: center;align-items: center">
    <img src="{{ Storage::url($e->imagenStds) }}" style="max-width: 100%;max-height: 100%" class="m-auto">
</div>
<div class="row align-items-center m-0 mb-3 p-0">
    <div class="col-auto p-0" style="height: 150px" >
        @if($menos == null)
            <a href="#" class="btn fw-bold m-3"></a>
        @else
            <a href="{{ url('estados/'.$menos->id) }}" class="btn text-light fw-bold m-1" style="height: 100%"> < </a>
        @endif
    </div>
    <div class="col p-0" style="height: 150px">
        <div class="text-wrap mx-0 p-1" style="width: 100%;background: rgba(0,0,0,0.2);border-radius: 20px">
            <h6 style="margin-bottom: 30px;text-align: center">{{ $e->textoStds }}</h6>
        </div>
    </div>
    <div class="col-auto p-0 text-light" style="height: 150px">
        @if($mas == null)
            <a href="#" class="btn fw-bold m-3"></a>
        @else
            <a href="{{ url('estados/'.$mas->id) }}" class="btn text-light fw-bold m-1" style="height: 100%"> > </a>
        @endif        
    </div>
</div>
@endsection
@section("javascripts")
<script>
    console.log("una vez")
    window.setInterval( () => {
        location.href = "/home"
    }, 30*1000)
    //var progreso = 0
    //var barrita = document.getElementById("progress-bar")
        //progreso += 3
        //console.log(barrita)
        //barrita.style.width = progreso + "%"        
    //var dia = 1000*60*60*24
    //const tiempoTranscurrido = Date.now()
    //hoy = new Date(tiempoTranscurrido)
    //console.log(hoy)
</script>
@endsection