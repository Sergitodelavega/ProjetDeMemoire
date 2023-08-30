<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class These extends Model
{
    use HasFactory;
    public const STATUS = ['open', 'in progress', 'completed'];
    protected $fillable = [
        'title', 'description', 'deadline', 'status', 'doctorant_id', 'encadreur_id'
    ];

    public function doctorant(){
        return $this->belongsTo(Doctorant::class);
    }

    public function encadreur(){
        return $this->belongsTo(Encadreur::class);
    }
}
