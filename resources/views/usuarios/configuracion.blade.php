@extends("layouts/plantilla")
@section("titulo","Configuracion")
@section("contenido")
<div class="mx-auto border border-5 rounded-3" style="padding: 30px;width: 65%">
    <table class="table">
        <tr class="class mb-5">
            <td>
                <h1 class="text-center mb-5">¿Que necesitas?</h1>
            </td>
        </tr>
        <tr class="align-middle">
            <td>
                <a href="{{ url('usuarios/'.$u->id.'/edit') }}" class="btn btn-lg btn-success align-middle fw-bold" style="width: 100%">Actualizar mi perfil, cambiar mi contraseña</a>
            </td>
        </tr>
        <tr>
            <td>
                <form method="POST" action="{{ url('logout') }}">
                @csrf
                <button type="submit" class="btn btn-lg btn-success fw-bold" style="width: 100%">Cerrar sesion</button>
                </form>
            </td>
        </tr>
        <tr class="">
            <td>
                <button type="button" class="btn btn-lg btn-danger fw-bold" data-bs-toggle="modal" data-bs-target="#confirmarBorrar" style="width: 100%">
                    Eliminar mi cuenta
                </button>
            </td>
        </tr>
    </table>
</div>

<div class="modal fade" tabindex="-1" id="confirmarBorrar" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
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
            <label class="form-label">¿Estas seguro de que quieres eliminar la cuenta <b>{{ $u->name }}</b>?</label>
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
    
@endsection
@section("javascripts")
<script>
    //var ventana = new bootstrap.Modal(document.getElementById("confirmarBorrar"))
    //ventana.show()
    /*
    var myModal = document.getElementById('confirmarBorrar')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
    })*/
</script>
@endsection