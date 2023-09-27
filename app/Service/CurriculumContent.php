<?php

namespace App\Service;

use App\Models\Assignment;
use Illuminate\Support\Facades\DB;

class CurriculumContent {
  public function saveCurriculum(string $name, int $unit_index) {
    DB::transaction(function () use ($name, $unit_index) {
      $curriculum_create = new Assignment();
      $curriculum_create->name = $name;
      $curriculum_create->unit_index = $unit_index;
      $curriculum_create->save();
    });
  }
  public function getelementcurriculum(int $id) {
    $curriculum = Assignment::where('id', $id)->first();
    return $curriculum;
  }
}
