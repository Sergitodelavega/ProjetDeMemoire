<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Encadreur extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'grade', 'specialite', 'matricule',
    ];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function doctorants() {
        return $this->hasMany(Doctorant::class);
    }

    public function theses(){
        return $this->hasMany(These::class);
    }
}
