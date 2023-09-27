<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Service\PersonalContentService;

class PersonalContentController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index() {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(string $id, PersonalContentService $personalContent) {
    //
    $personal = $personalContent->getcontent($id);
    return view('admin.personal.content.create')->with('personal', $personal);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request, PersonalContentService $personalContent) {
    //
    $id = $request->user_id;
    $personalContent->saveContent(
      $request->user_id,
      $request->progress,
      $request->problem,
      $request->advice,
      $request->next_month_goal,
      $request->else_memo
    );
    return redirect()->route('personal.show', ['id' => $id]);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id, PersonalContentService $personalContent) {
    //
    $content = $personalContent->getpersonalcontent($id);
    return view('admin.personal.content.show')->with('content', $content);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id, PersonalContentService $personalContent) {
    //
    $content = $personalContent->getpersonalcontent($id);
    return view('admin.personal.content.edit')->with('content', $content);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id, PersonalContentService $personalContent) {
    //
    $content = $personalContent->getpersonalcontent($id);
    $content->progress = $request->progress;
    $content->problem = $request->problem;
    $content->advice = $request->advice;
    $content->next_month_goal = $request->next_month_goal;
    $content->else_memo = $request->else_memo;
    $content->save();
    return redirect()->route('personal.content.show', ['id' => $id]);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id, PersonalContentService $personalContent) {
    //
    $content = $personalContent->getpersonalcontent($id);
    $content->delete();
    $userId = $content->getuser->id;
    return redirect()->route('personal.show', ['id' => $userId]);
  }
}
