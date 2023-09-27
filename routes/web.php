<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\MonthController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\CurriculumController;
use App\Http\Controllers\ObjectiveController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TeamRuleUpdateController;
use App\Http\Controllers\Admin\PersonalContentController;
use App\Http\Controllers\Admin\PersonalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/dashboard', function () {
//   return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//   Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/article/show/{id}', [HomeController::class, 'show'])->name('article.show');

Route::middleware('guest')->group(function () {
  Route::get('/admin/login', function () {
    return view('admin.login');
  });
  Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');
});
//ユーザーログイン専用
Route::middleware('auth')->group(function () {
  Route::get('/user/objective/index', [ObjectiveController::class, 'index'])->name('objective.index');
  Route::get('/user/objective/create', [ObjectiveController::class, 'create'])->name('objective.create');
  Route::post('/user/objective/create/', [ObjectiveController::class, 'store'])->name('objective.store');
  Route::get('/user/objective/{id}', [ObjectiveController::class, 'show'])->name('objective.show');
  Route::get('/user/objective/update/{id}', [ObjectiveController::class, 'edit'])->name('objective.edit');
  Route::put('/user/objective/team/update/{id}', TeamRuleUpdateController::class)->name('team.rule.update');
  Route::put('/user/objective/update/{id}', [ObjectiveController::class, 'update'])->name('objective.update');
  Route::delete('/user/objective/destory/{id}', [ObjectiveController::class, 'destroy'])->name('objective.destroy');
});
//管理者ログイン専用
Route::middleware('auth:admin')->group(function () {
  //管理者、ログイン、新規登録画面
  Route::get('/admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');
  Route::get('/admin/register', [AdminRegisterController::class, 'adminRegisterForm']);
  Route::post('/admin/register', [AdminRegisterController::class, 'adminRegister'])->name('admin.register');
  //社内記事、一覧、投稿、編集、削除
  Route::get('/admin/dashboard', [ArticleController::class, 'index'])->name('dashboard');
  Route::get('/admin/dashboard/create', [ArticleController::class, 'create'])->name('dashboard.create');
  Route::post('/admin/dashboard/create', [ArticleController::class, 'store'])->name('dashboard.store');
  Route::get('/admin/dashboard/edit/{id}', [ArticleController::class, 'edit'])->name('dashboard.edit');
  Route::put('/admin/dashboard/update/{id}', [ArticleController::class, 'update'])->name('dashboard.update');
  Route::delete('/admin/dashboard/delete/{id}', [ArticleController::class, 'destroy'])->name('dashboard.destroy');
  //月刊ページ、投稿、編集、削除
  Route::get('/admin/dashboard/month', [MonthController::class, 'index'])->name('month.index');
  Route::post('/admin/dashboard/month', [MonthController::class, 'store'])->name('month.store');
  Route::get('/admin/dashboard/month/{id}', [MonthController::class, 'edit'])->name('month.edit');
  Route::put('/admin/dashboard/month/{id}', [MonthController::class, 'update'])->name('month.update');
  //チームページ、投稿、編集
  Route::get('/admin/dashboard/team', [TeamController::class, 'index'])->name('team.index');
  Route::post('/admin/dashboard/team', [TeamController::class, 'store'])->name('team.store');
  Route::get('/admin/dashboard/team/{id}', [TeamController::class, 'edit'])->name('team.edit');
  Route::put('/admin/dashboard/team/{id}', [TeamController::class, 'update'])->name('team.update');
  //カリキュラムページ、投稿、編集、削除
  Route::get('/admin/dashboard/curriculum', [CurriculumController::class, 'index'])->name('curriculum.index');
  Route::post('/admin/dashboard/curriculum', [CurriculumController::class, 'store'])->name('curriculum.store');
  Route::get('/admin/dashboard/curriculum/{id}', [CurriculumController::class, 'edit'])->name('curriculum.edit');
  Route::put('/admin/dashboard/curriculum/{id}', [CurriculumController::class, 'update'])->name('curriculum.update');
  //来月の目標投稿一覧
  Route::get('/admin/dashboard/objective', [App\Http\Controllers\Admin\ObjectiveController::class, 'index'])->name('admin.objective.index');
  //個人面談ユーザー一覧,個人ページ
  Route::get('/admin/dashboard/personal/', [PersonalController::class, 'index'])->name('personal.index');
  Route::get('/admin/dashboard/personal/show{id}', [PersonalController::class, 'show'])->name('personal.show');
  //1on1閲覧ページ、投稿、編集、削除
  Route::get('/admin/dashboard/personal/content/show{id}', [PersonalContentController::class, 'show'])->name('personal.content.show');
  Route::get('/admin/dashboard/personal/content/create/{id}', [PersonalContentController::class, 'create'])->name('personal.content.create');
  Route::post('/admin/dashboard/personal/content/create', [PersonalContentController::class, 'store'])->name('personal.content.store');
  Route::get('/admin/dashboard/personal/content/edit/{id}', [PersonalContentController::class, 'edit'])->name('personal.content.edit');
  Route::put('/admin/dashboard/personal/content/update/{id}', [PersonalContentController::class, 'update'])->name('personal.content.update');
  Route::delete('/admin/dashboard/personal/content/delete/{id}', [PersonalContentController::class, 'destroy'])->name('personal.content.destroy');
});


require __DIR__ . '/auth.php';
