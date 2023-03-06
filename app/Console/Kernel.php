<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
//añadido por mi
use App\Models\Estado;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        //puesto por mi para la eliminacion de estados
        /*
        $schedule->call(function(){
            $lstEstados = Estados::all();
            foreach($lstEstados as $f){
                if( $f->created_at->diffInHours(now()) >= 24 ){
                    //mayor a 24 horas de existencia
                    $f->delete();
                }
            }
        })->hourly();
        */
        $schedule->command("eliminar:estado")->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
