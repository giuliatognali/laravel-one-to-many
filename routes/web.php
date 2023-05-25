<?php

use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
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
Route::get('/', function(){
    return view('welcome');
});

/* Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware([])->name('dashboard'); */

Route::middleware(['auth', 'verified'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {
    Route::get('/', [DashBoardController::class, 'index'])->name('dashboard');

    Route::resource('projects', ProjectController::class)->parameters(['projects'=>'project:slug']);
    //con parameters impostazione per usare slug come elemento di riferimento per la ricerca e non più id

    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
