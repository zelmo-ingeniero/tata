<!DOCTYPE html>
<html>
    <head>
        <title>TaTa - @yield("titulo","Historias")</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-5.1.3-dist/css/bootstrap.min.css') }}">        
    @yield("estiloscss")
    </head>
    <body>
        <div class="row mx-0" style="color: white">
            <div class="col-auto me-auto">
                <a type="button" class="btn-close btn-close-white mb-0" href="{{ url('home') }}" style="margin:30px"></a>
            </div>
            @yield("cabecera")
        </div>
        <div style="color: white">
        @yield("contenido")
        </div>
        <script type="text/javascript" src="{{ asset('vendor/bootstrap-5.1.3-dist/js/bootstrap.min.js') }}"></script>
        <script>
            document.body.style.backgroundColor="rgb("
                +Math.round( Math.random() * 205 )+","
                +Math.round( Math.random() * 205 )+","
                +Math.round( Math.random() * 205 )+")";
        </script>
        <!--
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="border: 1px solid #00cc00">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/storage/7b55e127867ac81004504cde3d800676.jpg" class="d-block" alt="uno">
            </div>
            <div class="carousel-item">
                <img src="/storage/7b55e127867ac81004504cde3d800676.jpg" class="d-block" alt="dos">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>-->
    @yield("javascripts")
    </body>
</html>
