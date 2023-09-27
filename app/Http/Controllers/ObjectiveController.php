<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objective;
use App\Models\ObjectiveAssignment;
use App\Models\User;
use App\Models\Assignment;
use App\Service\ObjectiveContent;
use App\Http\Requests\Objective\CreateRequest;
use App\Http\Requests\Objective\UpdateRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Illuminate\Support\Facades\Auth;

class ObjectiveController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index(ObjectiveContent $objectiveContent, Request $request) {
    $objective = $objectiveContent->getObjective();
    $team = $objectiveContent->getTeam();
    $month = $objectiveContent->Month();
    return view('user.objective.index')->with('objective', $objective)->with('team', $team)->with('month', $month);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(ObjectiveContent $objectiveContent) {
    //$assignmentこの3つは同じ値を3つ渡すためにインスタンスを3つ生成している
    $assignment = $objectiveContent->getAssignment();
    $team = $objectiveContent->getTeam();
    $month = $objectiveContent->getMonth();
    return view('user.objective.create')->with('assignment', $assignment)->with('team', $team)->with('month', $month);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CreateRequest $request, ObjectiveContent $objectiveContent) {
    $objectiveContent->saveAssignment(
      $request->userId(),
      $request->monthId(),
      $request->teamId(),
      $request->assignment(),
      $request->assignmentmin(),
      $request->assignmentmax(),
      $request->assignment_min_text(),
      $request->assignment_max_text(),
      $request->not_actived_text(),
      $request->measures_text(),
      $request->specific_text()
    );
    return redirect()->route('objective.show', ['id' => $request->user_id]);
  }

  /**
   * Display the specified resource.
   */
  // string $id
  public function show(string $id, ObjectiveContent $objectiveContent) {
    //urlで他のIDを指定してもアクセスできないようにする。
    $userId = Auth::id();
    if ($id != $userId) {
      throw new AccessDeniedHttpException();
    }
    $objective = User::find($id)->getObjective;
    $curriculum = Assignment::get();
    $user_information = Objective::where('user_id', $id)->with('assignments')->with('month')->with('user')->get();
    return view('user.objective.show')->with('objective', $objective)->with('user_information', $user_information)->with('curriculum', $curriculum);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Request $request, ObjectiveContent $objectiveContent) {
    $id = (int) $request->route('id');
    if (!$objectiveContent->checkOnObjective($request->user()->id, $id)) {
      throw new AccessDeniedHttpException();
    }
    $assignment = $objectiveContent->getAssignment();
    $month = $objectiveContent->month();
    $team = $objectiveContent->getTeam();
    $objective = Objective::where('id', $id)->firstOrFail();
    return view('user.objective.edit')->with('objective', $objective)->with('month', $month)->with('assignment', $assignment)->with('team', $team);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateRequest $request, ObjectiveContent $objectiveContent) {
    //
    $id = (int) $request->route('id');
    if (!$objectiveContent->checkOnObjective($request->user()->id, $id)) {
      throw new AccessDeniedHttpException();
    }
    $objective = Objective::where('id', $id)->firstOrFail();
    $objective->assignment_min_text = $request->assignment_min_text();
    $objective->assignment_max_text = $request->assignment_max_text();
    $objective->not_actived_text = $request->not_actived_text();
    $objective->measures_text = $request->measures_text();
    $objective->specific_text = $request->specific_text();
    $objective->team_id = $request->teamId();
    $objective->review_text = $request->review_text();
    $objective->save();
    $objective_assignments = ObjectiveAssignment::where('objective_id', $id)->get();
    $assignments = [$request->assignment(), $request->assignmentmin(), $request->assignmentmax(), $request->assignmentreview()];
    foreach ($assignments as $index => $assignment) {
      $objective_assignments[$index]->assignment_id = $assignment;
      $objective_assignments[$index]->save();
    };
    return redirect()->route('objective.show', ['id' => $objective->user_id]);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Request $request, ObjectiveContent $objectiveContent) {
    $id = (int) $request->route('id');
    if (!$objectiveContent->checkOnObjective($request->user()->id, $id)) {
      throw new AccessDeniedHttpException();
    }
    $objective = Objective::where('id', $id)->firstOrFail();
    $objective->delete();
    return redirect()->route('objective.show', ['id' => $objective->user_id]);
  }
}
