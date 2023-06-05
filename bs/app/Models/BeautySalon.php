<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeautySalon extends Model
{
    use HasFactory;
    protected $fillable = ['salon_name', 'address', 'phone_number'];
    public $timestamps = false;

    public function specialists()
    {
        return $this->hasMany(Specialist::class, 'beauty_salon_id');
    }
}
