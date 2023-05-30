<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'surname', 'photo', 'beauty_salon_id'];
    public $timestamps = false;

    public function salon()
    {
        return $this->belongsTo(BeautySalon::class, 'beauty_salon_id');
    }
}
