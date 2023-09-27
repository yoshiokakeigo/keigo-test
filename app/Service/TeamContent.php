<?php

namespace App\Service;

use App\Models\Team;
use Illuminate\Support\Facades\DB;

class TeamContent {
  public function saveTeam(string $team) {
    DB::transaction(function () use ($team) {
      $team_create = new Team();
      $team_create->team_name = $team;
      $team_create->save();
    });
  }
  public function getelementteam(int $id) {
    $team = Team::where('id', $id)->first();
    return $team;
  }
}
