<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamRuleUpdateController extends Controller {
  /**
   * Handle the incoming request.
   */
  public function __invoke(Request $request) {
    //
    $id = (int) $request->route('id');
    $team_rule = Team::where('id', $id)->firstOrFail();
    $team_rule->team_rule = $request->team_rule;
    $team_rule->save();
    return redirect()->route('objective.index');
  }
}
