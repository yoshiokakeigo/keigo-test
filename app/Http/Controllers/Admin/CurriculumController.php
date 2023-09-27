<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\ObjectiveContent;
use App\Http\Requests\Admin\CurriculumRequest;
use App\Service\CurriculumContent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


class CurriculumController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index(ObjectiveContent $objectiveContent) {
    //
    $curriculums = $objectiveContent->getAssignment();
    return view('admin.curriculum.index')->with('curriculums', $curriculums);
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
  public function store(CurriculumRequest $request, CurriculumContent $curriculumContent) {
    //
    $curriculumContent->saveCurriculum(
      $request->curriculum_name(),
      $request->unit_index()
    );
    return redirect()->route('curriculum.index');
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
  public function edit(string $id, CurriculumContent $curriculumContent) {
    //
    $curriculum = $curriculumContent->getelementcurriculum($id);
    if (!isset($curriculum)) {
      throw new AccessDeniedHttpException();
    }
    return view('admin.curriculum.edit')->with('curriculum', $curriculum);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(CurriculumRequest $request, CurriculumContent $curriculumContent, string $id) {
    //
    $curriculum = $curriculumContent->getelementcurriculum($id);
    $curriculum->name = $request->curriculum_name();
    $curriculum->unit_index = $request->unit_index();
    $curriculum->save();
    return redirect()->route('curriculum.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id, CurriculumContent $curriculumContent) {
    //
  }
}
