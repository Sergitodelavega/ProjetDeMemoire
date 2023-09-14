<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;
    public const STATUS = ['non soumis', 'en attente', 'validée', 'rejetée'];
    protected $fillable = [
        'title', 'description', 'status', 'doctorant_id,', 'semestre', 'deadline', 
    ];

    public function doctorant(){
        return $this->belongsTo(Doctorant::class);
    }

    public function fichiers(){
        return $this->hasMany(File::class, 'activity_id');
    }

    public function joursRestants()
    {
        // Vérifiez si la deadline est définie
        if ($this->deadline) {
            // Convertissez la date de création et la deadline en objets Carbon
            $dateCreation = Carbon::parse($this->created_at);
            $deadline = Carbon::parse($this->deadline);

            // Calculez la différence en jours
            $joursRestants = $dateCreation->diffInDays($deadline);

            return $joursRestants;
        }

        // Si la deadline n'est pas définie, retournez null ou une valeur par défaut
        return null;
    }
}
