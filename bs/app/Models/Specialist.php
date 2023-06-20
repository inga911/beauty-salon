<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class Specialist extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'surname', 'photo', 'beauty_salon_id', 'rate', 'rates', 'service_title'];
    public $timestamps = false;

    protected $casts = [
        'rates' => 'array',
    ];

    public function salon()
    {
        return $this->belongsTo(BeautySalon::class, 'beauty_salon_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
