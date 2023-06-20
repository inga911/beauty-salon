<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['service_title', 'service_descriptions', 'duration', 'price'];
    public $timestamps = false;

    public function specialists()
    {
        return $this->hasMany(Specialist::class, 'service_id');
    }

    // public function specialists()
    // {
    //     return $this->belongsToMany(Specialist::class, 'specialist_service');
    // }
    // public function service()
    // {
    //     return $this->belongsTo(Specialist::class, 'specialist_id');
    // }


    public function salon()
    {
        return $this->belongsTo(BeautySalon::class, 'beauty_salon_id');
    }
}
