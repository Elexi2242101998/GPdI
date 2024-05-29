<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GpdiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\UsersController;
use Faker\Core\File;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/verify', [AuthController::class, 'verify']);
Route::get('/forgot-password',[AuthController::class, 'forgotPw'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'mailPw'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPW'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPass'])->middleware('guest')->name('password.update');

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerProceed']);
Route::get('/register/activation/{token}', [AuthController::class, 'registerVerify']);


Route::get('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'dashboard'
], function (){
    Route::get('/',[DashboardController::class, 'index'])->name('dashboard.index');
});

Route::group(['middleware' => 'auth', 'prefix' => 'user'], function () {
    Route::get('/change-password', [TestingController::class, 'changePassword']);

    Route::post('/change-password', [TestingController::class, 'updatePassword']);
});


Route::middleware(['auth'])->prefix('user')->group(function () {
    // Routes for admin
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/', [UsersController::class, 'list']);
        Route::get('/add', [UsersController::class, 'add']);
        Route::get('/edit/{id}', [UsersController::class, 'edit']);
        Route::post('/update', [UsersController::class, 'update']);
        Route::post('/insert', [UsersController::class, 'insert']);
        Route::post('/delete', [UsersController::class, 'delete']);
        Route::get('/profil', [UsersController::class, 'profil'])->name('profile');
    });

    // Routes for user
    Route::middleware(['checkRole:user'])->group(function () {
        Route::get('/', [UsersController::class, 'list']);
        Route::get('/add', [UsersController::class, 'add']);
        Route::post('/insert', [UsersController::class, 'insert']);
        Route::get('/profil', [UsersController::class, 'profil'])->name('profile');
    });
});

Route::middleware(['auth'])->prefix('home')->group(function () {
    // Routes for admin
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/', [HomeController::class, 'list'])->name('home.index');
        Route::get('/add', [HomeController::class, 'add']);
        Route::get('/edit/{id}', [HomeController::class, 'edit']);
        Route::post('/update', [HomeController::class, 'update'])->name('home.update');
        Route::post('/insert', [HomeController::class, 'insert']);
        Route::post('/delete', [HomeController::class, 'delete']);
    });

    // Routes for user
    Route::middleware(['checkRole:user'])->group(function () {
        Route::get('/', [HomeController::class, 'list']);
        Route::get('/add', [HomeController::class, 'add']);
        Route::post('/insert', [HomeController::class, 'insert']);
    });
});

Route::prefix('Gpdi')->group(function (){
    Route::get('/',[GpdiController::class,'index'])->name('index');
    Route::get('/about',[GpdiController::class,'about'])->name('about');
    Route::get('/service',[GpdiController::class,'service'])->name('service');
    Route::get('/offering',[GpdiController::class,'offering'])->name('offering');
    Route::get('/schedule',[GpdiController::class,'schedule'])->name('schedule');
    Route::get('/media',[GpdiController::class,'media'])->name('media');
    Route::get('/kaumwanita',[GpdiController::class,'kaumwanita'])->name('kaumwanita');

});


Route::get('files/{filename}', function ($filename){
    $path = storage_path('app/public/images/' . $filename);
    if (!File::exists($path)) {
     abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('storage');
