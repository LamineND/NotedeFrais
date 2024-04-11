<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Laravel\Jetstream\Jetstream;

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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    
    Route::resource('/notes', \App\Http\Controllers\NotedeFraisController::class);
    
});



/*$role = Role::create(['name' => 'admin']);
$permission = Permission::create(['name' => 'users.create']);
$permission = Permission::create(['name' => 'users.edit']);
$permission = Permission::create(['name' => 'users.destroy']);
*/