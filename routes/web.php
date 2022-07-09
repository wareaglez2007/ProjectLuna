<?php

use App\Http\Controllers\livewire\ProjectController;
use Illuminate\Support\Facades\Route;

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
/**
 * Frontend access
 */
Route::get('/', function () {
    return view('welcome');
});
/**
 * Backend access
 */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('secured')->group(function () {

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/projects', [ProjectController::class, 'index'])
        ->name('project.show');

        Route::get('/projects/{pr_id}', [ProjectController::class, 'show'])
        ->name('project.show_item');

});


