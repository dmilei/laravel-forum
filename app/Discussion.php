<?php

namespace App;

use App\User;

class Discussion extends Model
{
  public function author()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function getRouteKeyName()
  {
    return 'slug';
  }
}
