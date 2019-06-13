<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
  protected $fillable = [
    'user_id',
    'name',
    'description',
    'rooms_number',
    'guests_number',
    'bathrooms',
    'area_sm',
    'address_lat',
    'address_lon',
    'image',
    'wifi',
    'car_p',
    'pool',
    'reception',
    'sauna',
    'sea_view'
  ];

  public function user() {
    return $this->belongsTo(User::class);
  }
}
