<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Service;

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
    'image'
  ];

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function services() {
    return $this->belongsToMany(Service::class);
  }
}
