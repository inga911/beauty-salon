<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['service_title', 'duration', 'price'];
    public $timestamps = false;

    public function specialists()
    {
        return $this->hasMany(Specialist::class, 'beauty_salon_id');
    }

    public function service()
    {
        return $this->belongsTo(Specialist::class, 'specialist_id');
    }
}
