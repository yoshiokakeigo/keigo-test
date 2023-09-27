<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\PersonalContentService;
use App\Models\Assignment;
use App\Models\Objective;

class PersonalController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index(PersonalContentService $personalContent) {
    //
    $users = $personalContent->getusers();
    return view('admin.personal.index')->with('users', $users);
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
  public function store(Request $request) {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id, PersonalContentService $personalContent) {
    //
    $personal = $personalContent->getcontent($id);
    $curriculum = Assignment::get();
    $user_information = Objective::where('user_id', $id)->with('assignments')->with('month')->with('user')->get();
    return view('admin.personal.show')->with('personal', $personal)->with('user_information', $user_information)->with('curriculum', $curriculum);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id) {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id) {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id) {
    //
  }
}
