<?php

namespace App\Http\Requests\Admin;


use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest {
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
      'title' => 'required|max:140',
      'images' => 'array|max:4',
      'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:3000'
    ];
  }
  public function messages() {
    return [
      'title.required' => '文字を入力してください',
      'title.max:140' => '140文字までです',
      'images.*.max:3000' => '3メガバイト以下の画像までです'
    ];
  }
  public function images(): array {
    return $this->file('images', []);
  }
  public function title(): string {
    return $this->input('title');
  }
  public function content(): string {
    return $this->input('content');
  }
}
