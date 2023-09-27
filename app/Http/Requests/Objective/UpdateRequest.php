<?php

namespace App\Http\Requests\Objective;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest {
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
      'assignment_min_text' => 'required',
      'assignment_max_text' => 'required',
      'not_actived_text' => 'required',
      'measures_text' => 'required',
      'specific_text' => 'required',
    ];
  }
  public function messages() {
    return [
      'assignment_min_text.required' => '文字を入力してください',
      'assignment_max_text.required' => '文字を入力してください',
      'not_actived_text.required' => '文字を入力してください',
      'measures_text.required' => '文字を入力してください',
      'specific_text.required' => '文字を入力してください',
    ];
  }

  public function teamId(): int {
    return $this->input('team');
  }
  public function assignment(): int {
    return $this->input('assignment');
  }
  public function assignmentmin(): int {
    return $this->input('assignmentmin');
  }
  public function assignmentmax(): int {
    return $this->input('assignmentmax');
  }
  public function assignment_min_text(): string {
    return $this->input('assignment_min_text');
  }
  public function assignment_max_text(): string {
    return $this->input('assignment_max_text');
  }
  public function not_actived_text(): string {
    return $this->input('not_actived_text');
  }
  public function measures_text(): string {
    return $this->input('measures_text');
  }
  public function specific_text(): string {
    return $this->input('specific_text');
  }
  public function review_text(): ?string {
    return $this->input('review_text');
  }
  public function assignmentreview(): ?int {
    return $this->input('assignmentreview');
  }
}
