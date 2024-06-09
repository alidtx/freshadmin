<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserNotificationController;
use App\Http\Controllers\SettingController;


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

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {;
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    Route::get('/user_delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user_delete');
    Route::get('/role_delete/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('role_delete');
    #profile
    Route::get('/profile-show', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::post('/profile_store', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile_store');
    Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'change_password_view'])->name('change_password');
    Route::post('/change-password/store', [App\Http\Controllers\HomeController::class, 'change_password'])->name('change_password_update');
    
    Route::get('/settings', [SettingController::class, 'create'])->name('settings.create');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
    Route::get('mark-as-read-all-notifications', [App\Http\Controllers\HomeController::class, 'marAllAsRead'])->name('marAllAsRead');
});
