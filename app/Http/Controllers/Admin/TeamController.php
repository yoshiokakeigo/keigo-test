<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\ObjectiveContent;
use App\Service\TeamContent;
use App\Http\Requests\Admin\TeamRequest;

class TeamController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index(ObjectiveContent $objectiveContent) {
    //追加、編集ページ、削除全てを一つにする
    $teams = $objectiveContent->getTeam();
    return view('admin.team.index')->with('teams', $teams);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(TeamRequest $request, TeamContent $teamContent) {
    //
    $teamContent->saveTeam(
      $request->team()
    );
    return redirect()->route('team.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id, TeamContent $teamContent) {
    //
    $team = $teamContent->getelementteam($id);
    return view('admin.team.edit')->with('team', $team);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(TeamRequest $request, string $id, TeamContent $teamContent) {
    //
    $team = $teamContent->getelementteam($id);
    $team->team_name = $request->team();
    $team->save();
    return redirect()->route('team.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id, TeamContent $teamContent) {
    //
  }
}
