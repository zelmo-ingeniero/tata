<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //viene desde UsuarioFactory.php
        Usuario::factory()->count(300)->create();
        //se siembra en la terminal
        /*$u=new Usuario();
        $u->nombresUsr="jkl";
        $u->nicknameUsr="jkl";
        $u->fechaNacimientoUsr="1999-5-30";
        $u->emailUsr="yhn";
        $u->contraseñaUsr="wsc";
        $u->save();
        $v=new Usuario();
        $v->nombresUsr="cvb";
        $v->nicknameUsr="dfg";
        $v->fechaNacimientoUsr="2005-12-21";
        $v->emailUsr="tyu";
        $v->contraseñaUsr="asdd";
        $v->save();
        $w=new Usuario();
        $w->nombresUsr="zxc";
        $w->nicknameUsr="edc";
        $w->fechaNacimientoUsr="1977-6-1";
        $w->emailUsr="tgb";
        $w->contraseñaUsr="ujm";
        $w->save();*/        
    }
}
