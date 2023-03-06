<!DOCTYPE html>
<html>
    <head>
        <title>TaTa - @yield("titulo","nombrepagina")</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-5.1.3-dist/css/bootstrap.min.css') }}">
        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">-->
    @yield("estiloscss")
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid fw-bold">
            <a class="navbar-brand" href="{{ url('home') }}">TaTa</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-lg-0">
                <li class="nav-item ">
                    <a class="nav-link active" href="{{ url('usuarios/configuracion') }}">Configuracion</a>
                </li>
                </ul>
                @guest
                <ul class="navbar-nav ms-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('login') }}">Ingresar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('register') }}">Registrarse</a>
                    </li>
                </ul>
                @endguest
                @auth
                <ul class="navbar-nav ms-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/usuarios/'.Auth::user()->id.'/edit') }}">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ url('logout') }}" class="nav-link active">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary fw-bold">Salir</button>
                        </form>
                    </li>
                </ul>
                @endauth  
                <!--
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('login') }}">
                    Iniciar sesion</a>
                </li>-->
            </div>
        </div>
        </nav>
        <div class="container-fluid" style="margin-top:50px;margin-bottom:150px;">
            @yield("contenido")
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <table class="table table-dark table-borderless">
                <tr></tr>
                <tr class="align-bottom" height="150">
                    <th width="3%"></th>
                    <th width="34%">
                        <H4><p class="text-start">Sergio Jared Valencia Cortaza</H4></p>
                    </th>
                    <th width="21%">
                        <H4><p class="text-center">TecNM ITSTB</H4></p>
                    </th>
                    <th width="34%">
                        <h4><p class="text-end">Contacta aquí</h4></p>
                    </th>
                    <th width="3%"></th>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <p class="text-start">
                            6° Semestre de ingeniería en sistemas computacionales.</p>
                    </td>
                    <td>
                        <p class="text-center">ISC-2010-224<br>
                        AEB-1055 Programación web<br>
                        Abril-Mayo de 2022</p>
                    </td>
                    <td>
                        <p class="text-end">Email: vsergiojared@gmail.com<br>
                            Teléfono: (+51) 2741358451</p>
                    </td>
                    <td></td>
                </tr>
                <tr class="align-middle">
                    <td class="" colspan="5" height="200">
                    <p class="text-center">
                        Copyright @ 2022 | 
                        <a href="{{ url('politicas-privacidad') }}" class="link-light">Mira nuestras politicas de privacidad</a>
                    </p>                    
                    </td>
                </tr>
            </table>
        </nav>
        <script type="text/javascript" src="{{ asset('vendor/bootstrap-5.1.3-dist/js/bootstrap.min.js') }}">
        </script>
        <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
        crossorigin="anonymous"></script>-->
        @yield("javascripts")
    </body>
</html>
