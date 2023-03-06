@extends("layouts/plantilla")
@section("titulo","CRUD Usuarios")
@section("contenido")
    <!--<div class="mx-auto" style="margin-bottom:50px;width:38.46%">
        <a href="{{ url('/usuarios/create') }}" class="btn btn-success fw-bold" style="width:100%">Nuevo</a>
    </div>-->
    <table class="table table-striped table-bordered table-hover">
    <thead>
        <tr class="table-success">
            <th scope="col">ID</th>
            <th scope="col">NOMBRES</th>
            <th scope="col">FECHA DE NACIMIENTO</th>
            <th scope="col">USUARIO</th>
            <th scope="col">CORREO ELECTRONICO</th>
            <th scope="col">OPCIONES</th>
        </tr>
    </thead>
        @foreach($mios as $m)
        <tr class="align-middle">
            <td>{{ $m->id }}</td>
            <td>{{ $m->nombreCompletoUsr }}</td>
            <td>{{ $m->fechaNacimientoUsr }}</td>
            <td>{{ $m->user->name }}</td>
            <td>{{ $m->user->email }}</td>
            <td>
                <div class="d-flex">
                    <a class="btn btn-success btn-sm fw-bold" href="{{ url('/usuarios/'.$m->id) }}" style="margin:5px">MOSTRAR</a>
                    <a class="btn btn-warning btn-sm fw-bold" href="{{ url('/usuarios/'.$m->id.'/edit') }}" style="margin:5px">EDITAR</a>
                    <a class="btn btn-danger btn-sm fw-bold" href="{{ url('/usuarios/'.$m->id.'/confirma-borrar') }}" style="margin:5px">BORRAR</a>
                    <!--<a class="btn btn-danger fw-bold" href="{{ url('/usuarios/'.$m->id.'/confirmaBorrar') }}" style="margin:5px">Borrar</a>-->
                </div>                
            </td>
        </tr>
        @endforeach
    </table>
    <ul class="nav justify-content-center mt-5">
        <li class="nav-item">
            {{ $mios->onEachSide(3)->links() }}
        </li>
    </ul>    
    <!--
    <table>
        <thead>
            <th>ID</th>
            <th>NOMBRES</th>
            <th>USUARIO</th>
            <th>FECHA DE NACIMIENTO</th>
            <th>CORREO</th>
            <th>CONTRASEÑA</th>
        </thead>
        @foreach($mios as $u)
        <tr>
            <td>{{$u->id}}</td>
            <td>{{$u->nombresUsr}}</td>
            <td>{{$u->nicknameUsr}}</td>
            <td>{{$u->fechaNacimientoUsr}}</td>
            <td>{{$u->emailUsr}}</td>
            <td>{{$u->contraseñaUsr}}</td>
        </tr>
        @endforeach
    </table>
        
    <p>primera prueba {{$u}}<br>
    $table->string("nombresUsr", 50);
    $table->string("nicknameUsr", 18);
    $table->date("fechaNacimientoUsr");
    $table->string("emailUsr", 255);
    $table->string("contraseñaUsr", 50);
    $table->boolean("sesionUsr")->default(false);</p>-->
@endsection