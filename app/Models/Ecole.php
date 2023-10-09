<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{
    use HasFactory;
    public function user(){
        return $this->hasOne(User::class, 'ecole_id');
    } 

    public function laboratoires(){
        return $this->hasMany(Laboratoire::class);
    }

    public function offers(){
        return $this->hasMany(Offer::class);
    }
}
