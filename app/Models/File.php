<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = ['activity_id', 'link'];

    public function activity(){
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}
