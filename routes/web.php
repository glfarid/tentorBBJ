<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AspekController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\BuatAkunAdmin;
use App\Http\Controllers\DataPribadiController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\KonversiGap;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\PemahamanController;
use App\Http\Controllers\PenilianController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\QuestionsPemahamanController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\ResponsePemahamanController;
use App\Http\Controllers\SoalPemahamanController;
use App\Models\Alternatif;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use PHPUnit\TextUI\XmlConfiguration\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/forgot-password', function () {
//     return view('auth.forgot-password');
// })->middleware('guest')->name('password.request');

// Route::post('/forgot-password', function (Request $request) {
//     $request->validate(['email' => 'required|email']);

//     $status = Password::sendResetLink(
//         $request->only('email')
//     );

//     return $status === Password::RESET_LINK_SENT
//         ? back()->with(['status' => __($status)])
//         : back()->withErrors(['email' => __($status)]);
// })->middleware('guest')->name('password.email');

// Route::get('/reset-password/{token}', function ($token) {
//     return view('auth.reset-password', ['token' => $token]);
// })->middleware('guest')->name('password.reset');

// Route::post('/reset-password', function (Request $request) {
//     $request->validate([
//         'token' => 'required',
//         'email' => 'required|email',
//         'password' => 'required|min:8|confirmed',
//     ]);

//     $status = Password::reset(
//         $request->only('email', 'password', 'password_confirmation', 'token'),
//         function ($user, $password) {
//             $user->forceFill([
//                 'password' => Hash::make($password)
//             ])->setRememberToken(Str::random(60));

//             $user->save();

//             event(new PasswordReset($user));
//         }
//     );

//     return $status === Password::PASSWORD_RESET
//         ? redirect()->route('login')->with('status', __($status))
//         : back()->withErrors(['email' => [__($status)]]);
// })->name('password.update');


Route::get('reject', function () {
    return view('error.index');
});

Route::get('rgstrAdmin', [BuatAkunAdmin::class, 'index'])->name('buatakunadmin.index');
Route::post('akunPost', [BuatAkunAdmin::class, 'akunPost'])->name('akunPost');

Route::middleware(['auth', 'role:Admin', 'verified'])->group(function () {

    Route::resource('aspek', AspekController::class);
    Route::get('/aspekDelete/{id}', [AspekController::class, 'aspekDelete'])->name('aspekDelete');
    Route::resource('kriteria', KriteriaController::class);
    Route::get('/kriteriaDelete/{id}', [KriteriaController::class, 'kriteriaDelete'])->name('kriteriaDelete');
    Route::resource('alternatif', AlternatifController::class);
    Route::get('/alternatifDelete/{id}', [AlternatifController::class, 'alternatifDelete'])->name('alternatifDelete');
    Route::resource('konversi', KonversiGap::class);
    Route::resource('penilaian', PenilianController::class)->except('update');
    Route::put('penilaian/update', [PenilianController::class, 'update'])->name('penilaian.update');
    Route::resource('perhitungan', PerhitunganController::class);
    Route::resource('questions', QuestionsController::class);
    Route::resource('questionspemahaman', PemahamanController::class);
    Route::resource('peserta', PesertaController::class);
    Route::get('jawaban/{id}', [PesertaController::class, 'jawaban'])->name('peserta.jawaban');
    Route::get('jawabanpemahaman/{id}', [PesertaController::class, 'jawabanpemahaman'])->name('peserta.jawabanpemahaman');
    Route::get('panduan', [PanduanController::class, 'index'])->name('panduan.index');
});


Route::middleware(['auth', 'role:Peserta', 'verified'])->group(function () {
    Route::resource('dpribadi', DataPribadiController::class);
});

Route::group(['middleware' => ['validated.user']], function () {
    // Routes for Response
    Route::resource('response', ResponseController::class);

    // Routes for ResponsePemahaman
    Route::resource('responsepemahaman', ResponsePemahamanController::class);
});

Route::middleware(['auth', 'role:Peserta,Admin', 'verified'])->group(function () {

    Route::resource('profile', ProfileController::class);
    Route::post('/updatePassword', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('updatePassword');
    Route::resource('hasil', HasilController::class);
    Route::get('/laporan', [HasilController::class, 'laporan'])->name('laporan');
});

// Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('pdf/{tes}', function ($request) {
    return $url = Storage::download('public/dokumen/' . $request);
})->name('pdf');

Route::get('deletefile', function () {
    Storage::delete(['public/dokumen/123123123123131_CV.pdf']);
    // Storage::disk('s3')->delete('path/file.jpg');
});
