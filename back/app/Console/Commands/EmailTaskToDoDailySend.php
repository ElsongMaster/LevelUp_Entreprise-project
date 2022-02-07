<?php

namespace App\Console\Commands;

use App\Mail\Recaptacherestante;
use App\Models\Personnecontact;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class EmailTaskToDoDailySend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Commande qui envoi chauqe jour à une heure précise la liste des tâches à effectuer';

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
        $personnesContact = Personnecontact::all();
        foreach ($personnesContact as $infosPersonne) {
            $idEntreprise = $infosPersonne->entreprise->id;
            Mail::to($infosPersonne->email)->bcc("dushimeelvis@gmail.com")->send(new Recaptacherestante($idEntreprise));
        }
        $this->info('Successfully sent daily quote to everyone.');
    }
}
