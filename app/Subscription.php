<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Apartment;

class Subscription extends Model
{
  protected $fillable = [
    'id',
    'apartment_id',
    'name',
    'braintree_id',
    'braintree_plan',
    'quantity',
    'trial_ends_at',
    'ends_at'

  ];

  public function apartment() {
    return $this->belongsTo(Apartment::class);
  }
}
