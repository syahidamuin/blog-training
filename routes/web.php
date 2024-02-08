<?php

use App\Http\Controllers\ArticleController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
route::get('/', [ArticleController::class, 'landing'])->name('landing');

route::get('/index', [ArticleController::class, 'index'])->middleware(['auth', 'verified'])->name('index');
route::get('/create', [ArticleController::class, 'create'])->middleware(['auth', 'verified'])->name('create');
route::get('/edit-article/{id}', [ArticleController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit');
route::put('/update-article/{id}', [ArticleController::class, 'update'])->middleware(['auth', 'verified'])->name('update');
route::delete('/delete-article/{id}', [ArticleController::class, 'destroy'])->middleware(['auth', 'verified'])->name('destroy');
route::post('/form-submit', [ArticleController::class, 'store'])->middleware(['auth', 'verified'])->name('form-submit');

route::get('/read-article/{id}', [ArticleController::class, 'read'])->name('read');

//Route::get('/dashboard', function () {
   // return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard'); //selagi tak login, tak boleh pergi dashboard

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
