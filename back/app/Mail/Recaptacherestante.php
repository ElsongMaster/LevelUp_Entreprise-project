<?php

namespace App\Mail;

use App\Models\Entreprise;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Recaptacherestante extends Mailable
{
    use Queueable, SerializesModels;
    public $donneeTache = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(int $idEntreprise)
    {
        $entreprise = Entreprise::find($idEntreprise);
        if ($entreprise->taches()->count() > 0) {

            foreach ($entreprise->taches()->get() as $tache) {
                array_push($this->donneeTache, $tache);
            }
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("gestion_entreprise@contact.com")->subject("Récapitulatif de la liste des tâches à effectuer")->view('emails.recaptacherestante');
    }
}
