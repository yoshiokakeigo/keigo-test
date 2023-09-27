<?php

namespace App\Service;

use App\Models\Month;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MonthContent {
  public function saveMonth($month) {
    DB::transaction(function () use ($month) {
      $month_create = new Month();
      $month_create->month_name = $month;
      $month_create->save();
    });
  }
  public function getelementmonth(int $id) {
    $month = Month::where('id', $id)->first();
    return $month;
  }
}
