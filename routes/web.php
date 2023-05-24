<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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
    $users_not_full = \App\Models\User::query()->select("id", "name", "image_path", "age", "gender", "hobbies", "looking_for", "extra_info", "contacts_vk", "contacts_whatsapp", "contacts_telegram")->get();
    $likes = explode(";", Auth::user()->likes);
    return view('pages.mainPage', ['users'=>$users_not_full, "likes"=>$likes]);
})->middleware(['auth']);

Route::get('/likes', function() {
    $users_not_full = \App\Models\User::query()->select("id", "name", "image_path", "age", "gender", "hobbies", "looking_for", "extra_info", "contacts_vk", "contacts_whatsapp", "contacts_telegram")->get();
    $likes = explode(";", Auth::user()->likes);
    return view('pages.likesPage', ['users'=>$users_not_full, "likes"=>$likes]);
})->middleware(['auth']);

Route::get('/logout', function () {
    Auth::logout();
    return back();
})->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/like-user', [ProfileController::class, 'like'])->name('like-user');
});


require __DIR__.'/auth.php';
