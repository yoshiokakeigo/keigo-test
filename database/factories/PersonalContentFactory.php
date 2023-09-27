<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PersonalContent;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PersonalContent>
 */
class PersonalContentFactory extends Factory {
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  protected $model = PersonalContent::class;
  public function definition(): array {
    return [
      //
    ];
  }
}
