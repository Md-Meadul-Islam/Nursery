<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $guarded = [];
    // public function allplants()
    // {
    //     return $this->hasMany(AllPlants::class, 'user_id');
    // }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function allplants()
    {
        return $this->belongsTo(AllPlants::class, 'plant_id');
    }
    public function gardens()
    {
        return $this->belongsTo(Garden::class, 'garden_id');
    }
}
