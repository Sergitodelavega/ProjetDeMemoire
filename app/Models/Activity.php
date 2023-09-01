<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'status', 'doctorant_id',
    ];

    public function doctorant(){
        return $this->belongsTo(Doctorant::class);
    }
}
