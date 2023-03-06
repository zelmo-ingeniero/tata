<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstadoRequest;
use App\Http\Requests\UpdateEstadoRequest;
use App\Models\Estado;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("estados/crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstadoRequest $request)
    {
        $e = new Estado();
        $e->textoStds =  $request->input("textoStds");
        $ruta = $request->imagenStds->store("public/imagenesStds");
        $e->imagenStds = $ruta;
        $e->usuario_id = Auth::user()->id;
        $e->created_at = now("America/Mexico_City");
        $e->save();
        return redirect("home");
        //$tablausrs = Usuario::all()->toArray();
        //return dd($request);
        //return dd( now("America/Mexico_City") );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show(Estado $estado)
    {
        //siguiente
        $sgnt = Estado::where('id', '>', $estado->id)->orderBy('id', 'asc')->first();
        //anterior
        $antrr = Estado::where('id', '<', $estado->id)->orderBy('id', 'desc')->first();
        $usuario = User::find($estado->usuario_id);
        $actual = Auth::user();
        //return dd($siguiente);
        $fecha = $estado->created_at->calendar();
        //return dd($fecha);
        return view("estados/mostrar", 
            ["e"=>$estado,"u"=>$usuario,"a"=>$actual,
            "f"=>$fecha,"menos"=>$antrr,"mas"=>$sgnt]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado $estado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstadoRequest  $request
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstadoRequest $request, Estado $estado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {
        Storage::delete($estado->imagenStds);
        $estado->delete();
        return redirect("/home");
    }
}
