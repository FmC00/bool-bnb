<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = [
    'user_id',
    'mail',
    'content'
  ];

  public function user() {
    return $this->belongsTo(User::class);
  }
}
