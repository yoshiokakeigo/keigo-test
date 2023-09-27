<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MonthRequest extends FormRequest {
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
      'month_name' => 'required'
    ];
  }
  public function messages() {
    return [
      'month_name.required' => '日付を入力してください'
    ];
  }
  public function month() {
    return $this->input('month_name');
  }
}
