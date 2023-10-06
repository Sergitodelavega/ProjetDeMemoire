<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratoire extends Model
{
    use HasFactory;
    protected $fillable = [
        'ecole_id', 'name',
    ];
    
    public function ecole(){
        return $this->belongsTo(Ecole::class);
    }

    public function unites(){
        return $this->hasMany(Unite::class);
    }
}
