<?php

namespace App\Service;

use App\Models\Assignment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Team;
use App\Models\Month;
use App\Models\Objective;
use App\Models\ObjectiveAssignment;
use PhpParser\Node\Expr\Cast\Object_;
use Illuminate\Http\Exceptions\HttpResponseException;

class ObjectiveContent {
  public function getAssignment() {
    return Assignment::get();
  }
  public function getTeam() {
    return Team::get();
  }
  public function getMonth() {
    return Month::orderBy('id', 'DESC')->get();
  }
  public function month() {
    return Month::orderBy('id', 'DESC')->paginate(12);
  }
  public function getObjective() {
    return Objective::with('assignments')->get();
  }
  //objective_create
  public function saveAssignment(int $userId, int $monthId, int $teamId, int $assignment, int $assignmentmin, int $assignmentmax, string $assignment_max_text, string $not_actived_text, string $measures_text, string $specific_text, string $assignment_min_text) {
    DB::transaction(function () use ($userId, $monthId, $teamId, $assignment, $assignmentmin, $assignmentmax, $assignment_max_text, $not_actived_text, $measures_text, $specific_text, $assignment_min_text) {
      //投稿が月に重複しないかジャッジしています
      $juje_objective = Objective::where('month_id', $monthId)->get();
      foreach ($juje_objective as $juje_objectives) {
        if ($monthId == $juje_objectives->month_id && $userId == $juje_objectives->user_id) {
          throw new HttpResponseException(redirect('/user/objective/create')->with('duplication_month', "今月はすでに投稿済みです"));
        }
      };
      $objective = new Objective;
      $objective->user_id = $userId;
      $objective->assignment_min_text = $assignment_min_text;
      $objective->assignment_max_text = $assignment_max_text;
      $objective->not_actived_text = $not_actived_text;
      $objective->measures_text = $measures_text;
      $objective->specific_text = $specific_text;
      $objective->team_id = $teamId;
      $objective->month_id = $monthId;
      $objective->save();
      //assignmentがそもそも値に入っていない
      $assignments = [$assignment, $assignmentmin, $assignmentmax];
      foreach ($assignments as $index => $assignment) {
        $objective_assignment = new ObjectiveAssignment;
        $objective_assignment->assignment_id = $assignment;
        $objective_assignment->objective_id = $objective->id;
        $objective_assignment->save();
      }
      $objective_assignments = new ObjectiveAssignment;
      $objective_assignments->objective_id = $objective->id;
      $objective_assignments->save();
    });
  }

  public function checkOnObjective(int $userId, int $id): bool {
    $objective = Objective::where('id', $id)->first();
    if (!$objective) {
      return false;
    }
    return $objective->user_id === $userId;
  }
}
