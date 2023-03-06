@extends('layouts/pantallaCompleta')
@section('titulo','Creando estados')
@section('estiloscss')
<style>
    input[type="file"]{
        display: none;
    }
    label{
        color: white;
        border: 1px solid white;
        border-radius: 15px;
        padding: 15px;
        font-size: 30px;
        text-align: center;
        font-family: arial;
        width: 100%;
    }
    label:hover{
        color: white;
        background-color: rgba(0,0,0,25%);
    }
    textarea{
        color: white;
        border: none;
        background-color: transparent;
        text-align: center;
        font-size: 30px;
        font-family: arial;
        width: 100%;
        height: 100px;
        padding: 5px;
    }
    textarea::placeholder{
        color: white;
        font-size: 30px;
        font-family: arial;
    }
    textarea:hover{
        background-color: rgba(0,0,0,25%);      
    }
    
</style>
@endsection
@section('cabecera')
    <div class="col-md-auto ms-auto">
        <button type="submit" class="btn btn-light fw-bold m-3" 
            onclick="event.preventDefault(); document.getElementById('crear-form').submit();">
            PUBLICAR
        </button>
    </div> 
@endsection
@section('contenido')
<div class="mx-auto" style=" width:65%">
    <form method="POST" action="{{ url('estados') }}" enctype="multipart/form-data" id="crear-form">
        @csrf
        <input type="file" class="@error('imagenStds') no-es-valido @enderror" id="imagenStds" name="imagenStds">
        <label for="imagenStds">Añadir imagen</label>
        @error('imagenStds')
        <div class="bg-dark opacity-50" >{{ $message }}</div>
        @enderror
        <textarea name="textoStds" id="textoStds" class="text-wrap mt-3 @error('textoStds') no-es-valido @enderror" cols="50" rows="2" placeholder="Escribe algo..."></textarea>
        @error('textoStds')
        <div class="bg-dark opacity-50">{{ $message }}</div>
        @enderror
    </form>
    <div id="preview" class="my-3 px-auto" style="height: 40vmin;text-align: center">

    </div>
</div>
@endsection
@section('javascripts')
<script>
    document.getElementById("imagenStds").onchange = function(e){
        let lectorArchivos = new FileReader();
        //obtiene imagen
        lectorArchivos.readAsDataURL( e.target.files[0] );
        lectorArchivos.onload = function(){
            let visualizador = document.getElementById("preview");
            //instancia de imagen
            imagen = document.createElement("img");
            imagen.src = lectorArchivos.result;
            imagen.style.height = "100%";
            //mete imagen a la vista
            visualizador.innerHTML = "";
            visualizador.append(imagen);
        }
    }
</script>
@endsection