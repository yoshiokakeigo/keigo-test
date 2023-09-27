<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\PersonalContent;

class PersonalContentService {
  public function getusers() {
    return User::get();
  }
  public function getcontent(int $id) {
    return User::where('id', $id)->with('getPersonal')->first();
  }
  public function saveContent(int $user_id, $problem,  $advice, $next_month_goal, $else_memo, $progress) {
    DB::transaction(
      function () use ($user_id, $problem, $advice, $next_month_goal, $else_memo, $progress) {
        $content = new PersonalContent();
        $content->user_id = $user_id;
        $content->progress = $progress;
        $content->problem = $problem;
        $content->advice = $advice;
        $content->next_month_goal = $next_month_goal;
        $content->else_memo = $else_memo;
        $content->save();
      }
    );
  }
  public function getpersonalcontent(int $id) {
    return PersonalContent::where('id', $id)->with('getuser')->firstOrFail();
  }
}
