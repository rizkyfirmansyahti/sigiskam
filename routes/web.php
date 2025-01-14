<?php

use App\Http\Controllers\Admin\DashboardControllers;
use App\Http\Controllers\Admin\DataGISControllers;
use App\Http\Controllers\Admin\UsersControllers;
use App\Http\Controllers\Users\AuthControllers;
use App\Http\Controllers\Users\DataBencanaControllers;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // View Beranda
    Route::get('/', function () {
        return view('users.partials.index');
    })->name('beranda');
    // Authent Login
    Route::post('/auth', [AuthControllers::class, 'auth'])->name('auth');
    // API Bencana
    Route::get('/data-bencana', [DataBencanaControllers::class, 'data']);
    Route::get('/search', [DataBencanaControllers::class, 'search'])->name('search');
});

Route::prefix('admin')->middleware('check.users')->group(function () {
    // Logout
    Route::get('/logout', [AuthControllers::class, 'logout'])->name('admin.logout');
    // Dashboard
    Route::get('/data', [DashboardControllers::class, 'data']);
    Route::get('/dashboard', function () {
        return view('admin.partials.dashboard.index');
    })->name('admin.dashboard');
    // Users
    Route::get('/users', [UsersControllers::class, 'index'])->name('users.index');
    Route::get('/users/create', [UsersControllers::class, 'create'])->name('users.create');
    Route::post('/users/store', [UsersControllers::class, 'store'])->name('users.store');
    Route::delete('/users/delete/{id_users}', [UsersControllers::class, 'delete'])->name('users.delete');
    // Data GIS
    Route::get('/data-gis', [DataGISControllers::class, 'index'])->name('datagis.index');
    Route::get('/data-gis/create', [DataGISControllers::class, 'create'])->name('datagis.create');
    Route::post('/data-gis/store', [DataGISControllers::class, 'store'])->name('datagis.store');
    Route::get('/data-gis/delete/{id_bencana}', [DataGISControllers::class, 'delete'])->name('datagis.delete');

});

