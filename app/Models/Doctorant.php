<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctorant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id, matricule', 'specialite', 'matricule',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function encadreur() {
        return $this->belongsTo(Encadreur::class);
    }

    public function these(){
        return $this->hasOne(These::class);
    }
}       
