<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PersonalContent extends Model {
  use HasFactory;
  public function getuser() {
    return $this->belongsTo(User::class, 'user_id');
  }
}
