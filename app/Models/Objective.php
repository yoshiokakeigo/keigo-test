<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model {
  use HasFactory;
  public function user() {
    return $this->belongsTo(User::class);
  }
  public function team() {
    return $this->belongsTo(Team::class);
  }
  public function month() {
    return $this->belongsTo(Month::class);
  }
  public function assignments() {
    return $this->belongsToMany(Assignment::class, 'objective_assignment')->wherePivotNotNull('assignment_id')->using(ObjectiveAssignment::class)->orderBy('objective_assignment.id', 'ASC');
  }
}
