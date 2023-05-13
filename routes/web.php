<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    $users_not_full = \App\Models\User::query()->select("name", "image_path", "gender", "hobbies", "looking_for", "extra_info", "contacts_vk", "contacts_whatsapp", "contacts_telegram")->get();
    return view('pages.mainPage', ['users'=>$users_not_full]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/upload_image', [ImageController::class, 'save'])->name('image.save');

require __DIR__.'/auth.php';
