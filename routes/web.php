<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataCustomer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControlController;
use App\Http\Controllers\UproleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/datacustomer', [DataCustomer::class, 'index'])->name('datacustomer');
    Route::get('/damatambah',[DataCustomer::class,'tambah']);
    Route::get('/damaedit/{id}',[DataCustomer::class,'edit']);
    Route::post('/damahapus/{id}',[DataCustomer::class,'hapus']);

    Route::post('/logout',[ProfileController::class,'logout'])->name('logout');

        // new
        Route::post('/tambahdama', [DataCustomer::class, 'create']);
        Route::post('/editdama', [DataCustomer::class, 'change']);
    
        Route::get('/tambahuc', [UserControlController::class, 'tambah']);
        Route::get('/edituc/{id}', [UserControlController::class, 'edit']);
        Route::post('/hapusuc/{id}', [UserControlController::class, 'hapus']);
        Route::post('/tambahuc', [UserControlController::class, 'create']);
        Route::post('/edituc', [UserControlController::class, 'change']);
    
        Route::post('/uprole/{id}', [UproleController::class, 'index']);

        Route::get('/user-control', 'UserController@control')->name('usercontrol');

});

require __DIR__.'/auth.php';
