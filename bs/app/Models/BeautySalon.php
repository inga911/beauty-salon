<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeautySalon extends Model
{
    use HasFactory;
    protected $fillable = ['salon_name', 'address', 'phone_number', 'city'];
    public $timestamps = false;

    public function specialists()
    {
        return $this->hasMany(Specialist::class, 'beauty_salon_id');
    }

    const SORT = [
        'default' => 'No sort',
        'name_asc' => 'By name A-Z',  
        'name_desc' => 'By name Z-A',  
        'city_name_asc' => 'By city name A-Z',  
        'city_name_desc' => 'By city name Z-A',  
    ];

    const FILTER = [
        'default' => 'Show all',
        'have_spec' => 'Have specialists',
        'dont_have_spec' => 'Dont have specialists'
    ];
}
