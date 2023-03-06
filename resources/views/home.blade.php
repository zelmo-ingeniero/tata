@extends('layouts/plantilla')
@section('titulo','Principal')
@section('estiloscss')
    <link rel="stylesheet" href="{{ asset('vendor/Glider.js-master/glider.min.css') }}">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">-->
    <style>
        .carousel__anterior,
        .carousel__siguiente{
            display: block;
            margin-top: 100px;
            margin-left: 10px;
            margin-right: 10px;
            text-align: center;
            background: white;
            border: none;
            width: 40px;
            height: 40px;
        }
    </style>
@endsection
@section('contenido')
<div class="carousel">
    <div class="carousel__contenedor container shadow d-flex p-0" style="width:95%; overflow: hidden">
        <a class="btn px-0 mx-3" href="{{ url('estados/create') }}">
            <div class="" style="width: 100px">
                <div style="height: 200px;overflow: hidden">
                    <img src="{{ Storage::url('icono-mas.png') }}" class="border rounded-3" style="height: 100%;width: 100%;object-fit: cover;object-position: center">
                </div>
                <p style="margin-bottom:0">Crear</p>
            </div>
        </a>
        <button class="carousel__anterior shadow fw-bold"> < </button>
        <div class="carousel__lista d-flex">
        @foreach($estds as $s)
            @if($s->usuario_id == $actual->id)
            <a class="btn" href="{{ url('estados/'.$s->id) }}">
                <div class="carousel__elemento" style="width: 100px">
                    <div class="border rounded-3" style="height: 200px;overflow: hidden">
                        <img src="{{ Storage::url($s->imagenStds) }}" alt="{{ $actual->name }}" style="height: 100%;width: 100%;object-fit: cover;object-position: center">
                    </div>
                    <p class="text-truncate mb-0">Tú</p>
                </div>
            </a>
            @else
                @foreach($default as $d)
                    @if($s->usuario_id == $d->id)
                    <a class="btn" href="{{ url('estados/'.$s->id) }}">
                        <div class="carousel__elemento" style="width: 100px">
                            <div class="border rounded-3" style="height: 200px;overflow: hidden">
                                <img src="{{ Storage::url($s->imagenStds) }}" alt="{{ $d->name }}" style="height: 100%;width: 100%;object-fit: cover;object-position: center">
                            </div>
                            <p class="text-truncate mb-0">{{ $d->name }}</p>
                        </div>
                    </a>
                    @endif
                @endforeach
            @endif        
        @endforeach
        </div>
        <button class="carousel__siguiente shadow fw-bold"> > </button>
    </div>
</div>

<div class="container my-5">
  <div class="row row-cols-6">
    @foreach($default as $d)
        <a class="list-group-item" href="{{ url('usuarios/'.$d->id) }}">{{ $d->name }}</a>
    @endforeach
  </div>
</div>
<!--
<div class="container shadow m-5" style="width:25%">
    <div class="list-group list-group-flush">
        @foreach($default as $d)
        <a class="list-group-item" href="{{ url('usuarios/'.$d->id) }}">{{ $d->name }}</a>
        @endforeach
    </div>
</div>-->

@endsection
@section('javascripts')
    <script src="{{ asset('vendor/Glider.js-master/glider.min.js') }}"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>-->
    <script>
        window.addEventListener('load', function(){
            new Glider(document.querySelector('.carousel__lista'), {
                slidesToShow: 'auto',
                slidesToScroll: 1,
                arrows: {
                    prev: '.carousel__anterior',
                    next: '.carousel__siguiente'
                },
                responsive: [
                    {
                    breakpoint: 775,
                    settings: {
                        // Set to `auto` and provide item width to adjust to viewport
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        itemWidth: 200,
                        duration: 0.25
                    }
                    },{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 6,
                        slidesToScroll: 2,
                        itemWidth: 200,
                        duration: 0.25
                    }
                    }
                ]
            });
        });
    </script>
@endsection
