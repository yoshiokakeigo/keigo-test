<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest {
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
      'team_name' => 'required'
    ];
  }
  public function messages() {
    return [
      'team_name.required' => 'チーム名を入力してください'
    ];
  }
  public function team(): string {
    return $this->input('team_name');
  }
}
