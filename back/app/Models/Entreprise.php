<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    
    public function user(){
        return $this->belongsTo(Profilcompany::class);
    }

    public function personnecontact(){
        return $this->hasOne(Personnecontact::class);
    }

}
