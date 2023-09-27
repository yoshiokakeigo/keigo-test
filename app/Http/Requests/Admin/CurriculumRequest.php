<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CurriculumRequest extends FormRequest {
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
   */
  public function rules(): array {
    return [
      //
      'name' => 'required',
      'unit_index' => 'integer | required | digits_between:0,3'
    ];
  }
  public function messages() {
    return [
      'name.required' => '課題名を入力してください',
      'unit_index.integer' => '整数値を入れてください',
      'unit_index.required' => '値を入れてください',
      'unit_index.digits_between:0,3' => '三桁以下で入力してください',
    ];
  }
  public function curriculum_name(): string {
    return $this->input('name');
  }
  public function unit_index(): int {
    return $this->input('unit_index');
  }
}
