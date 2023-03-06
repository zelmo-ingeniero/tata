<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$a = Usuario::all();
        $a = Usuario::paginate(5);
        $b = User::all();
        //cuando escribas la ruta recibiras la vista y la lista
        return view("usuarios/index", ["mios"=>$a, "default"=>$b]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("usuarios/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsuarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsuarioRequest $request)
    {
        $en = new User();
        $en->name = $request->input("name");
        $en->email = $request->input("email");
        $en->password = Hash::make($request->input("password"));
        $en->save();
        //mio y por default comparten info
        $es = new Usuario();
        $es->nombreCompletoUsr = $request->input("nombres");
        $es->fechaNacimientoUsr = $request->input("fechanacimiento");
        $es->user_id = $en->id;
        //primero uno y luego el otro
        $es->save();
        return redirect("home");
        /*
        $u=new Usuario();
        $u->nombresUsr = $request->input("nombres");
        $u->nicknameUsr = $request->input("nicknameUsr");
        $u->fechaNacimientoUsr = $request->input("fechanacimiento");
        $u->emailUsr = $request->input("email");
        $u->contraseñaUsr = $request->input("contrasena");
        $u->save();
        algunas cosas en especifico no se pueden hacer en el request
        como lo son las contraseñas seguras
        $validador = Validator::make($request->all(), [
            "contraseña" => ['required', 'confirmed', 
            //revisa que no se encuentre en diccionarios de hakers
            Password::min(6)->letters()->numbers()->uncompromised()],
        ]);
        if($validador->fails()){
            //si falla se mandan los errores al create
            return redirect('usuarios/create')->withErrors($validador)->withInput();
        }else{
            //no fallan se registra
            $u=new Usuario();
            $u->nombresUsr = $request->input("nombres");
            $u->nicknameUsr = $request->input("nicknameUsr");
            $u->fechaNacimientoUsr = $request->input("fechanacimiento");
            $u->emailUsr = $request->input("email");
            $u->contraseñaUsr = $request->input("contraseña");
            $u->save();
        }
        return redirect("usuarios");
        switch($request->input("mes")){
            case "Enero":
                $numeroMes = "01"; break;
            case "Febrero":
                $numeroMes = "02"; break;
            case "Marzo":
                $numeroMes = "03"; break;
            case "Abril":
                $numeroMes = "04"; break;
            case "Mayo":
                $numeroMes = "05"; break;
            case "Junio":
                $numeroMes = "06"; break;
            case "Julio":
                $numeroMes = "07"; break;
            case "Agosto":
                $numeroMes = "08"; break;
            case "Septiembre":
                $numeroMes = "09"; break;
            case "Octubre":
                $numeroMes = "10"; break;
            case "Noviembre":
                $numeroMes = "11"; break;
            case "Diciembre":
                $numeroMes = "12"; break;
            default:
                $numeroMes = null; break;
        }
        //$u->fechaNacimientoUsr = $request->input("año").'-'.$numeroMes.'-'.$request->input("dia");
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        $fecha = Carbon::createFromFormat("Y-m-d", $usuario->fechaNacimientoUsr)->formatLocalized("%A %e de %B del %Y");
        //dd( $fecha->formatLocalized("%d de %B de %Y") );
        return view("usuarios/show",["u"=>$usuario,"v"=>$usuario->user,"f"=>$fecha]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        return view("usuarios/edit",["u"=>$usuario,"v"=>$usuario->user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsuarioRequest  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        $vlddr = Validator::make($request->all(),[
            "nicknameUsr" => "unique:users,name,".$usuario->id
        ]);
        if($vlddr->fails()){
            return redirect('usuarios/'.$usuario->id.'/edit')->withErrors($vlddr)->withInput();
        }else{
            $usuario->nombreCompletoUsr = $request->input("nombres");
            $usuario->fechaNacimientoUsr = $request->input("fechaNacimiento");
            $usuario->user->name = $request->input("nicknameUsr");
            if( !($request->input("contrasena") == null) ){
                $usuario->user->password = Hash::make($request->input("contrasena"));
            }  
            $usuario->user->save();
            $usuario->save(); 
            return redirect("usuarios/configuracion");
        }
        /*
        if($usuario->nicknameUsr == $request->input("nicknameUsr")){
            //no se actualiza el nombre de usuario
            $usuario->nombresUsr = $request->input("nombres");
            $usuario->fechaNacimientoUsr = $request->input("fechaNacimiento");
            $usuario->contraseñaUsr = $request->input("contrasena");
            $usuario->save();
            return redirect("usuarios");
        }else{
            //si se cambio el nickname comprobar si ya existe en la BD
            $validador = Validator::make($request->all(),[
                'nicknameUsr' => [Rule::unique("usuarios")->ignore($usuario->id)]
            ]);
            if($validador->fails()){
                //no pasa la validacion
                return redirect('usuarios/'.$usuario->id.'/edit')->withErrors($validador)->withInput();
            }else{
                //se cambio y seria unico en la base de datos
                $usuario->nombresUsr = $request->input("nombres");
                $usuario->fechaNacimientoUsr = $request->input("fechaNacimiento");
                $usuario->contraseñaUsr = $request->input("contrasena");
                $usuario->save();
                return redirect("usuarios");
            }
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $copia = User::find($usuario->id);
        $usuario->delete();
        $copia->delete();  
        Session::flush();
        Auth::logout();
        return redirect("/");              
    }
    /*necesario por cuestiones del metodo DELETE
    public function confirmaBorrar(Usuario $usuario){
        return view("usuarios/confirmaBorrar",["u"=>$usuario]);
    }*/

    public function politicas(){
        $imagen = base_path("public\storage\icono-mas.png");
        $formato = pathinfo($imagen, PATHINFO_EXTENSION);
        $contenido = file_get_contents($imagen);
        $chica = "data:image/".$formato.";base64, ".base64_encode($contenido);
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true,
            "isRemoteEnabled"=>true,"defaultFont"=>"sans-serif"])
            ->loadView("politicasPrivacidad", ["i"=>$chica]);
        //dd( base64_encode($contenido) );
        //dd($pdf);
        return $pdf->stream("archivo-pdf.pdf");
        //return view("politicasPrivacidad", ["i"=>$chica]);
    }

    public function configuracion(){
        $actual = Auth::user();
        return view("usuarios/configuracion", ["u"=>$actual]);
    }
}
