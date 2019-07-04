<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Service;
use App\Subscription;

use Laravel\Cashier\Billable;

class Apartment extends Model
{
  use Billable;

  protected $fillable = [
    'user_id',
    'name',
    'description',
    'price',
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

  // public function subscription() {
  //   return $this->hasOne(Subscription::class);
  // }

  public function services() {
    return $this->belongsToMany(Service::class);
  }
}
