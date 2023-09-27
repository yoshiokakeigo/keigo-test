<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller {
  //

  public function adminRegisterForm(Request $request) {
    return view('admin.register');
  }

  protected function adminValidator(array $data) {
    return Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:App\Models\AdminUser'],
      'password' => ['required', 'confirmed', Password::min(8)],
      'admin_level' => ['required', 'numeric'],
    ]);
  }

  protected function adminRegisterDatabase(array $data) {
    return AdminUser::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
      'admin_level' => $data['admin_level'],
    ]);
  }

  public function adminRegister(Request $request) {
    $this->adminValidator($request->all())->validate();

    $user = $this->adminRegisterDatabase($request->all());

    if ($user) {
      return view('admin.register', ['registered' => true, 'registered_email' => $user->email]);
    }
  }
}
