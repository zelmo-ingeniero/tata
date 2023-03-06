<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
//añadido por mi 
use App\Models\Estado;
use Illuminate\Support\Facades\Storage;

class EliminarEstados extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eliminar:estado';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando de Artisan para eliminar estados que superen 
        las 24 horas de existencia';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //return 0;
        //hecho por mi
        //echo "prueba de funcionalidad";
        $lstEstados = Estado::all();
        $cantidad = 0;
        foreach($lstEstados as $f){            
            if( $f->created_at->diffInHours(now("America/Mexico_City")) >= 24 ){
                //mayor a 24 horas de existencia
                echo "Estado numero".$f->id." eliminado; \n";
                Storage::delete($f->imagenStds);
                $f->delete();
                $cantidad++;
            }
        }
        echo "Completado, ".$cantidad." estados eliminados";
    }
}
