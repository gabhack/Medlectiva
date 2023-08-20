<?php

use App\Http\Controllers\ProgramController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\SpecialistInvitationController;
use App\Http\Controllers\InvitationRegisterController;
use App\Models\Program;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $randomPrograms = Program::inRandomOrder()->take(6)->get();

    return view('welcome', ['programs' => $randomPrograms]);
});

Route::get('/dashboard', function () {
    $user = auth()->user();

    if (!$user) {
        return redirect()->route('login'); // o cualquier otro comportamiento para usuarios no logueados
    }

    if ($user->hasRole('Especialista')) {
        if ($user->first_time) {
            return redirect()->route('programs.edit');
        }
    } elseif ($user->hasRole('IPS')) {
        return redirect()->route('hospitals.show', ['hospital' => $user->hospital_id]);
    } else {
        return redirect()->route('programs.authIndex');
    }
})->name('dashboard');

Route::get('/rotations', function () {
    if (auth()->check()) {
        return redirect()->route('programs.authIndex');
    }

    return app(ProgramController::class)->guestIndex();
})->name('programs.guestIndex');
Route::get('/register', [InvitationRegisterController::class, 'showRegistrationForm'])->name('register');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    //Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
    Route::get('/programs/create', [ProgramController::class, 'create'])->name('programs.create');
    Route::post('/programs', [ProgramController::class, 'store'])->name('programs.store');
    Route::get('/programs/authIndex', [ProgramController::class, 'authIndex'])->name('programs.authIndex');
    Route::get('/programs', [ProgramController::class, 'authIndex'])->name('programs.authIndex');
    Route::get('/programs/enrolled', [ProgramController::class, 'showEnrolledPrograms'])->name('programs.enrolled');
    Route::get('/programs/{program}/editRespaldo', [ProgramController::class, 'editRespaldo'])->name('programs.editRespaldo');
    Route::get('/programs/edit', [ProgramController::class, 'edit'])->name('programs.edit');
    Route::get('programs/{program}/enroll-form', [ProgramController::class, 'showEnrollForm'])->name('programs.showEnrollForm');
    Route::put('/programs/{program}', [ProgramController::class, 'update'])->name('programs.update');
    Route::delete('/programs/{program}', [ProgramController::class, 'destroy'])->name('programs.destroy');
    Route::post('/programs/{program}/enroll', [ProgramController::class, 'enroll'])->name('programs.enroll');
    Route::get('/hospitals/invite', [SpecialistInvitationController::class, 'create'])->name('hospitals.invite');
    Route::post('/hospitals/invite', [SpecialistInvitationController::class, 'store']);
    Route::get('/hospitals/{hospital}', [HospitalController::class, 'show'])->name('hospitals.show');
    Route::get('/hospitals/{hospital}/edit', [HospitalController::class, 'edit'])->name('hospitals.edit');
    Route::put('/hospitals/{hospital}', [HospitalController::class, 'update'])->name('hospitals.update');
    Route::get('/programs/{program}/enroll', [ProgramController::class, 'enroll'])->name('programs.enroll');

});
Route::get('/programs/{program}', [ProgramController::class, 'show'])->name('programs.show');