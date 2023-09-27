<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder {
  /**
   * Run the database seeds.
   */
  public function run(): void {
    //
    DB::table('teams')->insert([
      'team_name' => 'チーム今井さん'
    ]);
    DB::table('teams')->insert([
      'team_name' => 'チーム浅田さん'
    ]);
  }
}
