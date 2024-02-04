<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllPlants extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function garden()
    {
        return $this->belongsTo(Garden::class);
    }
    public function usersplantscart()
    {
        return $this->belongsToMany(User::class, 'plants_users_carts', 'plant_id', 'user_id');
    }
    public function ratings()
    {
        return $this->hasMany(Ratings::class, 'plant_id');
    }
    public function orders()
    {
        return $this->hasMany(Orders::class, 'plant_id');
    }
}