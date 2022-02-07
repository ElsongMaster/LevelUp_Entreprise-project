<?php

namespace App\Console;

use App\Mail\Recaptacherestante;
use App\Models\Personnecontact;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        Commands\EmailTaskToDoDailySend::class,
    ];
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('email:task')->dailyAt('11:35')->appendOutputTo(storage_path('logs/emails.log'));
        // $schedule->command('email:task')->everyMinute()->appendOutputTo(storage_path('logs/emails.log'));

        // $schedule->call(function () {
        //     $personnesContact = Personnecontact::all();
        //     foreach ($personnesContact as $infosPersonne) {
        //         $idEntreprise = $infosPersonne->entreprise->id;
        //         Mail::to($infosPersonne->email)->bcc("dushimeelvis@gmail.com")->send(new Recaptacherestante($idEntreprise));
        //     }
        //     // foreach($personnesContact)
        // })->dailyAt('03:30');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
