@extends('layouts/plantilla')
@section('titulo','Eliminar tu cuenta')
@section('contenido')
<div class="modal fade in" tabindex="-1" id="confirmarBorrar" data-bs-backdrop="static" data-bs-keyboard="false" style="display:block">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form method="POST" action="{{ url('usuarios/'.$u->id) }}">
        @csrf
        @method('DELETE')
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmacion</h5>
            <a href="{{ url('usuarios/configuracion') }}" class="btn-close" aria-label="Close"></a>
        </div>
        <div class="modal-body">
            <label class="form-label">¿Estas seguro de que quieres eliminar la cuenta <b>{{ $u->user->name }}</b>?</label>
            <label class="form-label">Esta accion es irreversible<label>
        </div>
        <div class="modal-footer">
            <a href="{{ url('usuarios/configuracion') }}" class="btn btn-danger fw-bold">CANCELAR</a>
            <button type="submit" class="btn btn-primary fw-bold">SI</button>
        </div>
    </form>
    </div>
</div>
</div>
<h1 class="text-center">Cuenta eliminada exitosamente</h1>
<div class="mx-auto" style="width:27%; margin:25px">
    <a href="{{ url('/') }}" class="btn btn-success fw-bold">VOLVER AL INICIO</a>
</div>
@endsection
@section('javascripts')
<script>
    //para que el modal aparezca al cargar la pagina
    var ventana = new bootstrap.Modal(document.getElementById("confirmarBorrar"))
    ventana.show()
    /*var miModal = document.getElementById('confirmarBorrar')
    miModal.addEventListener('show.bs.modal', function (event) {
        //action del boton SI al presionarlo
        var accion = document.getElementById('pregunta').action
        // boton que invoca al modal
        var boton = event.relatedTarget
        // toma dato desde los atributos de data-bs-* del boton
        var idDeUsr = boton.getAttribute('data-bs-whatever')
        // actualizar el contenido del modal
        var titulo = miModal.querySelector('.modal-title')
        var cuerpolabel = miModal.querySelector('.modal-body label')
        //metodo destroy del Usuariocontroller
        accion = "{{ url('usuarios/'." +idDeUsr+ ") }}"
        titulo.textContent = 'Advertencia ' + idDeUsr
        cuerpolabel.textContent = 'Estas seguro de que deseas eliminar la cuenta ' + idDeUsr + '? esta accion es irreversible'
    })*/
</script>
@endsection