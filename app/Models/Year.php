<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    public function activities(){
        return $this->hasMany(Activity::class);
    }

    public function doctorant(){
        return $this->hasOne(Doctorant::class, 'year_id');
    } 
}
