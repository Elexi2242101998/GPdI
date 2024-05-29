<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GpdiController;
use App\Http\Controllers\HistoriDanFotoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IbadahKaumBapaController;
use App\Http\Controllers\IbadahKaumWanitaController;
use App\Http\Controllers\IbadahMingguRayaController;
use App\Http\Controllers\IbadahRayonController;
use App\Http\Controllers\IbadahYouthController;
use App\Http\Controllers\JadwalPelayananController;
use App\Http\Controllers\OfferingController;
use App\Http\Controllers\OurContactController;
use App\Http\Controllers\PojokJemaatController;
use App\Http\Controllers\ProfilPendetaController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SekolahMingguController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\UsersController;
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

// Route Group Services
Route::middleware(['auth'])->prefix('services')->group(function () {
    // Routes for admin
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/', [ServiceController::class, 'list'])->name('service.index');
        Route::get('/add', [ServiceController::class, 'add']);
        Route::get('/edit/{id}', [ServiceController::class, 'edit']);
        Route::post('/update', [ServiceController::class, 'update'])->name('service.update');
        Route::post('/insert', [ServiceController::class, 'insert']);
        Route::post('/delete', [ServiceController::class, 'delete']);
    });

    // Routes for user
    Route::middleware(['checkRole:user'])->group(function () {
        Route::get('/', [ServiceController::class, 'list']);
        Route::get('/add', [ServiceController::class, 'add']);
        Route::post('/insert', [ServiceController::class, 'insert']);
    });
});
Route::middleware(['auth'])->prefix('about')->group(function () {
    // Routes for admin
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/', [AboutController::class, 'list'])->name('about.index');
        Route::get('/add', [AboutController::class, 'add']);
        Route::get('/edit/{id}', [AboutController::class, 'edit']);
        Route::post('/update', [AboutController::class, 'update'])->name('about.update');
        Route::post('/insert', [AboutController::class, 'insert']);
        Route::post('/delete', [AboutController::class, 'delete']);
    });

    // Routes for user
    Route::middleware(['checkRole:user'])->group(function () {
        Route::get('/', [AboutController::class, 'list']);
        Route::get('/add', [AboutController::class, 'add']);
        Route::post('/insert', [AboutController::class, 'insert']);
    });
});
Route::middleware(['auth'])->prefix('sekolahminggu')->group(function () {
    // Routes for admin
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/', [SekolahMingguController::class, 'list'])->name('sekming.index');
        Route::get('/add', [SekolahMingguController::class, 'add']);
        Route::get('/edit/{id}', [SekolahMingguController::class, 'edit']);
        Route::post('/update', [SekolahMingguController::class, 'update'])->name('sekming.update');
        Route::post('/insert', [SekolahMingguController::class, 'insert']);
        Route::post('/delete', [SekolahMingguController::class, 'delete']);
    });

    // Routes for user
    Route::middleware(['checkRole:user'])->group(function () {
        Route::get('/', [SekolahMingguController::class, 'list']);
        Route::get('/add', [SekolahMingguController::class, 'add']);
        Route::post('/insert', [SekolahMingguController::class, 'insert']);
    });
});
Route::middleware(['auth'])->prefix('offering')->group(function () {
    // Routes for admin
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/', [OfferingController::class, 'list'])->name('offering.index');
        Route::get('/add', [OfferingController::class, 'add']);
        Route::get('/edit/{id}', [OfferingController::class, 'edit']);
        Route::post('/update', [OfferingController::class, 'update'])->name('offering.update');
        Route::post('/insert', [OfferingController::class, 'insert']);
        Route::post('/delete', [OfferingController::class, 'delete']);
    });

    // Routes for user
    Route::middleware(['checkRole:user'])->group(function () {
        Route::get('/', [OfferingController::class, 'list']);
        Route::get('/add', [OfferingController::class, 'add']);
        Route::post('/insert', [OfferingController::class, 'insert']);
    });
});
Route::middleware(['auth'])->prefix('jadwalpelayanan')->group(function () {
    // Routes for admin
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/', [JadwalPelayananController::class, 'list'])->name('jadpel.index');
        Route::get('/add', [JadwalPelayananController::class, 'add']);
        Route::get('/edit/{id}', [JadwalPelayananController::class, 'edit']);
        Route::post('/update', [JadwalPelayananController::class, 'update'])->name('jadpel.update');
        Route::post('/insert', [JadwalPelayananController::class, 'insert']);
        Route::post('/delete', [JadwalPelayananController::class, 'delete']);
    });

    // Routes for user
    Route::middleware(['checkRole:user'])->group(function () {
        Route::get('/', [JadwalPelayananController::class, 'list']);
        Route::get('/add', [JadwalPelayananController::class, 'add']);
        Route::post('/insert', [JadwalPelayananController::class, 'insert']);
    });
});
Route::middleware(['auth'])->prefix('histori')->group(function () {
    // Routes for admin
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/', [HistoriDanFotoController::class, 'list'])->name('histori.index');
        Route::get('/add', [HistoriDanFotoController::class, 'add']);
        Route::get('/edit/{id}', [HistoriDanFotoController::class, 'edit']);
        Route::post('/update', [HistoriDanFotoController::class, 'update'])->name('histori.update');
        Route::post('/insert', [HistoriDanFotoController::class, 'insert']);
        Route::post('/delete', [HistoriDanFotoController::class, 'delete']);
    });

    // Routes for user
    Route::middleware(['checkRole:user'])->group(function () {
        Route::get('/', [HistoriDanFotoController::class, 'list']);
        Route::get('/add', [HistoriDanFotoController::class, 'add']);
        Route::post('/insert', [HistoriDanFotoController::class, 'insert']);
    });
});
Route::middleware(['auth'])->prefix('kaumbapa')->group(function () {
    // Routes for admin
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/', [IbadahKaumBapaController::class, 'list'])->name('bapa.index');
        Route::get('/add', [IbadahKaumBapaController::class, 'add']);
        Route::get('/edit/{id}', [IbadahKaumBapaController::class, 'edit']);
        Route::post('/update', [IbadahKaumBapaController::class, 'update'])->name('bapa.update');
        Route::post('/insert', [IbadahKaumBapaController::class, 'insert']);
        Route::post('/delete', [IbadahKaumBapaController::class, 'delete']);
    });

    // Routes for user
    Route::middleware(['checkRole:user'])->group(function () {
        Route::get('/', [IbadahKaumBapaController::class, 'list']);
        Route::get('/add', [IbadahKaumBapaController::class, 'add']);
        Route::post('/insert', [IbadahKaumBapaController::class, 'insert']);
    });
});
Route::middleware(['auth'])->prefix('kaumwanita')->group(function () {
    // Routes for admin
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/', [IbadahKaumWanitaController::class, 'list'])->name('wanita.index');
        Route::get('/add', [IbadahKaumWanitaController::class, 'add']);
        Route::get('/edit/{id}', [IbadahKaumWanitaController::class, 'edit']);
        Route::post('/update', [IbadahKaumWanitaController::class, 'update'])->name('wanita.update');
        Route::post('/insert', [IbadahKaumWanitaController::class, 'insert']);
        Route::post('/delete', [IbadahKaumWanitaController::class, 'delete']);
    });

    // Routes for user
    Route::middleware(['checkRole:user'])->group(function () {
        Route::get('/', [IbadahKaumWanitaController::class, 'list']);
        Route::get('/add', [IbadahKaumWanitaController::class, 'add']);
        Route::post('/insert', [IbadahKaumWanitaController::class, 'insert']);
    });
});
Route::middleware(['auth'])->prefix('rayon')->group(function () {
    // Routes for admin
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/', [IbadahRayonController::class, 'list'])->name('rayon.index');
        Route::get('/add', [IbadahRayonController::class, 'add']);
        Route::get('/edit/{id}', [IbadahRayonController::class, 'edit']);
        Route::post('/update', [IbadahRayonController::class, 'update'])->name('rayon.update');
        Route::post('/insert', [IbadahRayonController::class, 'insert']);
        Route::post('/delete', [IbadahRayonController::class, 'delete']);
    });

    // Routes for user
    Route::middleware(['checkRole:user'])->group(function () {
        Route::get('/', [IbadahRayonController::class, 'list']);
        Route::get('/add', [IbadahRayonController::class, 'add']);
        Route::post('/insert', [IbadahRayonController::class, 'insert']);
    });
});
Route::middleware(['auth'])->prefix('youth')->group(function () {
    // Routes for admin
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/', [IbadahYouthController::class, 'list'])->name('youth.index');
        Route::get('/add', [IbadahYouthController::class, 'add']);
        Route::get('/edit/{id}', [IbadahYouthController::class, 'edit']);
        Route::post('/update', [IbadahYouthController::class, 'update'])->name('youth.update');
        Route::post('/insert', [IbadahYouthController::class, 'insert']);
        Route::post('/delete', [IbadahYouthController::class, 'delete']);
    });

    // Routes for user
    Route::middleware(['checkRole:user'])->group(function () {
        Route::get('/', [IbadahYouthController::class, 'list']);
        Route::get('/add', [IbadahYouthController::class, 'add']);
        Route::post('/insert', [IbadahYouthController::class, 'insert']);
    });
});
Route::middleware(['auth'])->prefix('mingguraya')->group(function () {
    // Routes for admin
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/', [IbadahMingguRayaController::class, 'list'])->name('mingguraya.index');
        Route::get('/add', [IbadahMingguRayaController::class, 'add']);
        Route::get('/edit/{id}', [IbadahMingguRayaController::class, 'edit']);
        Route::post('/update', [IbadahMingguRayaController::class, 'update'])->name('mingguraya.update');
        Route::post('/insert', [IbadahMingguRayaController::class, 'insert']);
        Route::post('/delete', [IbadahMingguRayaController::class, 'delete']);
    });

    // Routes for user
    Route::middleware(['checkRole:user'])->group(function () {
        Route::get('/', [IbadahMingguRayaController::class, 'list']);
        Route::get('/add', [IbadahMingguRayaController::class, 'add']);
        Route::post('/insert', [IbadahMingguRayaController::class, 'insert']);
    });
});
Route::middleware(['auth'])->prefix('contact')->group(function () {
    // Routes for admin
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/', [OurContactController::class, 'list'])->name('contact.index');
        Route::get('/add', [OurContactController::class, 'add']);
        Route::get('/edit/{id}', [OurContactController::class, 'edit']);
        Route::post('/update', [OurContactController::class, 'update'])->name('contact.update');
        Route::post('/insert', [OurContactController::class, 'insert']);
        Route::post('/delete', [OurContactController::class, 'delete']);
    });

    // Routes for user
    Route::middleware(['checkRole:user'])->group(function () {
        Route::get('/', [OurContactController::class, 'list']);
        Route::get('/add', [OurContactController::class, 'add']);
        Route::post('/insert', [OurContactController::class, 'insert']);
    });
});
Route::middleware(['auth'])->prefix('pojokjemaat')->group(function () {
    // Routes for admin
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/', [PojokJemaatController::class, 'list'])->name('pojok.index');
        Route::get('/add', [PojokJemaatController::class, 'add']);
        Route::get('/edit/{id}', [PojokJemaatController::class, 'edit']);
        Route::post('/update', [PojokJemaatController::class, 'update'])->name('pojok.update');
        Route::post('/insert', [PojokJemaatController::class, 'insert']);
        Route::post('/delete', [PojokJemaatController::class, 'delete']);
    });

    // Routes for user
    Route::middleware(['checkRole:user'])->group(function () {
        Route::get('/', [PojokJemaatController::class, 'list']);
        Route::get('/add', [PojokJemaatController::class, 'add']);
        Route::post('/insert', [PojokJemaatController::class, 'insert']);
    });
});
Route::middleware(['auth'])->prefix('profilependeta')->group(function () {
    // Routes for admin
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/', [ProfilPendetaController::class, 'list'])->name('profilpen.index');
        Route::get('/add', [ProfilPendetaController::class, 'add']);
        Route::get('/edit/{id}', [ProfilPendetaController::class, 'edit']);
        Route::post('/update', [ProfilPendetaController::class, 'update'])->name('profilpen.update');
        Route::post('/insert', [ProfilPendetaController::class, 'insert']);
        Route::post('/delete', [ProfilPendetaController::class, 'delete']);
    });

    // Routes for user
    Route::middleware(['checkRole:user'])->group(function () {
        Route::get('/', [ProfilPendetaController::class, 'list']);
        Route::get('/add', [ProfilPendetaController::class, 'add']);
        Route::post('/insert', [ProfilPendetaController::class, 'insert']);
    });
});
Route::middleware(['auth'])->prefix('schedule')->group(function () {
    // Routes for admin
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/', [ScheduleController::class, 'list'])->name('schedule.index');
        Route::get('/add', [ScheduleController::class, 'add']);
        Route::get('/edit/{id}', [ScheduleController::class, 'edit']);
        Route::post('/update', [ScheduleController::class, 'update'])->name('schedule.update');
        Route::post('/insert', [ScheduleController::class, 'insert']);
        Route::post('/delete', [ScheduleController::class, 'delete']);
    });

    // Routes for user
    Route::middleware(['checkRole:user'])->group(function () {
        Route::get('/', [ScheduleController::class, 'list']);
        Route::get('/add', [ScheduleController::class, 'add']);
        Route::post('/insert', [ScheduleController::class, 'insert']);
    });
});


Route::prefix('Gpdi')->group(function (){
    Route::get('/',[GpdiController::class,'index'])->name('index');
    Route::get('/about',[GpdiController::class,'about'])->name('about');
    Route::get('/service',[GpdiController::class,'service'])->name('service');
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

Route::get('videos/{filename}', function ($filename){
    $path = storage_path('app/public/videos/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('video_storage');
