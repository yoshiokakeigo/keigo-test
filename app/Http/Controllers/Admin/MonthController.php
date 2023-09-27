<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\ObjectiveContent;
use App\Service\MonthContent;
use App\Http\Requests\Admin\MonthRequest;

class MonthController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index(ObjectiveContent $objectiveContent) {
    //追加、編集ページ、削除全てを一つにする
    $months = $objectiveContent->month();
    return view('admin.month.index')->with('months', $months);
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
  public function store(MonthRequest $request, MonthContent $monthContent) {
    //
    $monthContent->saveMonth(
      $request->month()
    );
    return redirect()->route('month.index');
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
  public function edit(string $id, MonthContent $monthContent) {
    //
    $month = $monthContent->getelementmonth($id);
    return view('admin.month.edit')->with('month', $month);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(MonthRequest $request, string $id, MonthContent $monthContent) {
    //
    $month = $monthContent->getelementmonth($id);
    $month->month_name = $request->month();
    $month->save();
    return redirect()->route('month.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id, MonthContent $monthContent) {
    //
  }
}
