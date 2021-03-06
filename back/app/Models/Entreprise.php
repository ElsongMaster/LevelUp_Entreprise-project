<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function personnecontact(){
        return $this->hasOne(Personnecontact::class);
    }
    public function taches(){
        return $this->hasMany(Tache::class);
    }

}
