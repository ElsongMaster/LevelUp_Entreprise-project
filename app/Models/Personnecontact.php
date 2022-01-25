<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnecontact extends Model
{
    use HasFactory;


    public function profilcompany(){
        return $this->belongsTo(profilcompany::class);
    }


}
