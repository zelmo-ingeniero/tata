@extends("layouts.app")
@section("title","Create una cuenta")
@section("content")
    <div class="mx-auto border border-5 rounded-3" style="padding: 30px;width: 35%">
    <form method="PUT" action="{{ url('usuarios/store') }}">
        @csrf
        @method('POST')
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('nombres') no-es-valido @enderror" name="nombres" value="{{ old('nombres') }}" placeholder=" ">
            <label class="form-label">Nombres</label>
            @error('nombres') 
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>       
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('fechanacimiento') no-es-valido @enderror" name="fechanacimiento" min="1922-01-01" max="2004-12-31" value="{{ old('fechanacimiento') }}" placeholder=" " onfocus="(this.type='date')"  onblur="(this.type='text')">
            <label class="form-label">Fecha de nacimiento</label>
            @error('fechanacimiento')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('name') no-es-valido @enderror" name="name" value="{{ old('name') }}" placeholder=" ">
            <label class="form-label" >Nombre de usuario</label>
            @error('name') 
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!--<div class="mb-3">
            <label class="form-label">Fecha de nacimiento</label>
            <div class="input-group">        
                <input type="text" class="form-control @error('año') no-es-valido @enderror" 
                    name="año" placeholder="Año">
                <select class="form-select @error('mes') no-es-valido @enderror" name="mes">
                    <option value="Enero">Enero</option>
                    <option value="Febrero">Febrero</option>
                    <option value="Marzo">Marzo</option>
                    <option value="Abril">Abril</option>
                    <option value="Mayo">Mayo</option>
                    <option value="Junio">Junio</option>
                    <option value="Julio">Julio</option>
                    <option value="Agosto">Agosto</option>
                    <option value="Septiembre">Septiembre</option>
                    <option value="Octubre">Octubre</option>
                    <option value="Noviembre">Noviembre</option>
                    <option value="Diciembre">Diciembre</option>
                </select>
                <input type="text" class="form-control @error('dia') no-es-valido @enderror" 
                    name="dia" placeholder="Dia">
            </div>
            @error('año')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('mes')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('dia')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>    -->        
        <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') no-es-valido @enderror" name="email" value="{{ old('email') }}" placeholder=" ">
            <label class="form-label">Correo electronico</label>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password') no-es-valido @enderror" name="password" value="{{ old('password') }}" placeholder=" ">
            <label class="form-label">Contraseña nueva</label>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password_confirmation') no-es-valido @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder=" ">
            <label class="form-label">Confirma la contraseña</label>
            @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mx-3">
            <button type="submit" class="btn btn-primary fw-bold" style="margin:5px;width: 100%">CONTINUAR</button>
        </div>
    </form>
</div>
@endsection