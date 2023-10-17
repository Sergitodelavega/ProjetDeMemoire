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
        'title', 'description', 'status', 'doctorant_id,', 'semestre', 'deadline', 'delai', 
    ];

    public function doctorant(){
        return $this->belongsTo(Doctorant::class);
    }

    public function year(){
        return $this->belongsTo(Year::class);
    }

    public function fichiers(){
        return $this->hasMany(File::class, 'activity_id');
    }

    public function daysUntilDeadline()
    {
        $deadline = $this->calculateDeadline();
        if(!empty($deadline))
        {
            $deadlineDate = Carbon::parse($deadline);
            $currentDate = Carbon::now();
            $daysRemaining = $currentDate->diffInDays($deadlineDate);

            return $daysRemaining;
        }
        return null;
    }

    public function calculateDeadline()
    {
        if (!empty($this->delai)) {
            $dateCreationCompte = $this->doctorant->created_at;
            $dateLimite = Carbon::parse($dateCreationCompte)->addDays($this->delai);

            return $dateLimite->format('d-m-Y');
        }
        return null;
    }

    public function remainingTime()
    {
        $daysRemaining = $this->daysUntilDeadline();
        if (!is_null($daysRemaining)) {
            if ($daysRemaining >= 7 && $daysRemaining <= 29) {
                $weeksRemaining = ceil($daysRemaining / 7);
                return "$weeksRemaining semaine(s)";
            } elseif ($daysRemaining >= 30) {
                $monthsRemaining = ceil($daysRemaining / 30);
                return "$monthsRemaining mois";
            } else {
                return "$daysRemaining jour(s)";
            }
        }
        return null;
    }


}

