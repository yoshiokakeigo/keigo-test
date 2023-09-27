<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignmentSeeder extends Seeder {
  /**
   * Run the database seeds.
   */
  public function run(): void {
    //
    DB::table('assignments')->insert([
      'name' => '入門・環境構築',
      'unit_index' => '1'
    ]);
    DB::table('assignments')->insert([
      'name' => '1-Puzzle-01',
      'unit_index' => '2'
    ]);
    DB::table('assignments')->insert([
      'name' => '1-Puzzle-02',
      'unit_index' => '3'
    ]);
    DB::table('assignments')->insert([
      'name' => '2-Knock-01',
      'unit_index' => '4'
    ]);
    DB::table('assignments')->insert([
      'name' => '2-Knock-02',
      'unit_index' => '5'
    ]);
    DB::table('assignments')->insert([
      'name' => '2-Knock-03',
      'unit_index' => '6'
    ]);
    DB::table('assignments')->insert([
      'name' => '3-Practice-01',
      'unit_index' => '7'
    ]);
    DB::table('assignments')->insert([
      'name' => '3-Practice-02',
      'unit_index' => '8'
    ]);
    DB::table('assignments')->insert([
      'name' => '1-jQuery-01',
      'unit_index' => '9'
    ]);
    DB::table('assignments')->insert([
      'name' => '1-jQuery-02',
      'unit_index' => '10'
    ]);
    DB::table('assignments')->insert([
      'name' => '1-jQuery-03',
      'unit_index' => '11'
    ]);
    DB::table('assignments')->insert([
      'name' => '1-jQuery-04',
      'unit_index' => '12'
    ]);
    DB::table('assignments')->insert([
      'name' => '1-jQuery-05',
      'unit_index' => '13'
    ]);
    DB::table('assignments')->insert([
      'name' => '1-jQuery-06',
      'unit_index' => '14'
    ]);
    DB::table('assignments')->insert([
      'name' => '1-jQuery-07',
      'unit_index' => '15'
    ]);
    DB::table('assignments')->insert([
      'name' => '1-jQuery-08',
      'unit_index' => '16'
    ]);
    DB::table('assignments')->insert([
      'name' => 'デプロイ',
      'unit_index' => '17'
    ]);
    DB::table('assignments')->insert([
      'name' => '基礎・環境構築',
      'unit_index' => '18'
    ]);
    DB::table('assignments')->insert([
      'name' => '1-EJS-01',
      'unit_index' => '19'
    ]);
    DB::table('assignments')->insert([
      'name' => '1-EJS-02',
      'unit_index' => '20'
    ]);
    DB::table('assignments')->insert([
      'name' => '2-Sass-01',
      'unit_index' => '21'
    ]);
    DB::table('assignments')->insert([
      'name' => '2-Sass-02',
      'unit_index' => '22'
    ]);
    DB::table('assignments')->insert([
      'name' => '1-PHP-01',
      'unit_index' => '23'
    ]);
    DB::table('assignments')->insert([
      'name' => '1-PHP-02',
      'unit_index' => '24'
    ]);
    DB::table('assignments')->insert([
      'name' => '2-DB-01',
      'unit_index' => '25'
    ]);
    DB::table('assignments')->insert([
      'name' => '2-DB-02',
      'unit_index' => '26'
    ]);
    DB::table('assignments')->insert([
      'name' => '1-Doker-01',
      'unit_index' => '27'
    ]);
    DB::table('assignments')->insert([
      'name' => '1-Doker-02',
      'unit_index' => '28'
    ]);
    DB::table('assignments')->insert([
      'name' => 'Laravel-01',
      'unit_index' => '29'
    ]);
    DB::table('assignments')->insert([
      'name' => 'Laravel-02',
      'unit_index' => '30'
    ]);
    DB::table('assignments')->insert([
      'name' => 'Laravel-03',
      'unit_index' => '31'
    ]);
    DB::table('assignments')->insert([
      'name' => 'Laravel-04',
      'unit_index' => '32'
    ]);
    DB::table('assignments')->insert([
      'name' => 'Vue.js-01',
      'unit_index' => '33'
    ]);
    DB::table('assignments')->insert([
      'name' => 'WordPress-01',
      'unit_index' => '34'
    ]);
  }
}
