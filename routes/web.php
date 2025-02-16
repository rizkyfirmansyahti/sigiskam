<?php

use App\Http\Controllers\Admin\DashboardControllers;
use App\Http\Controllers\Admin\DataGISControllers;
use App\Http\Controllers\Admin\KecKelControllers;
use App\Http\Controllers\Admin\UsersControllers;
use App\Http\Controllers\Users\AuthControllers;
use App\Http\Controllers\Users\DataBencanaControllers;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // View Home
    Route::get('/', function () {
        return view('users.partials.index');
    })->name('beranda');
    // View Maps
    Route::get('/maps', function () {
        return view('users.partials.maps');
    })->name('maps');
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
    Route::get('/maps', [DashboardControllers::class, 'maps']);
    Route::get('/dashboard', function () {
        return view('admin.partials.dashboard.index');
    })->name('admin.dashboard');
    // Users
    Route::get('/users', [UsersControllers::class, 'index'])->name('users.index');
    Route::get('/users/create', [UsersControllers::class, 'create'])->name('users.create');
    Route::post('/users/store', [UsersControllers::class, 'store'])->name('users.store');
    Route::get('/users/show/{id_users}', [UsersControllers::class, 'show'])->name('users.show');
    Route::post('/users/update/{id_users}', [UsersControllers::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{id_users}', [UsersControllers::class, 'delete'])->name('users.delete');
    // Data GIS
    Route::get('/data-gis', [DataGISControllers::class, 'index'])->name('datagis.index');
    Route::get('/data-gis/create', [DataGISControllers::class, 'create'])->name('datagis.create');
    Route::get('/get-kelurahan', [DataGISControllers::class, 'getKelurahan'])->name('datagis.getKelurahan');

    Route::post('/data-gis/store', [DataGISControllers::class, 'store'])->name('datagis.store');
    Route::get('/data-gis/show/{id_bencana}', [DataGISControllers::class, 'show'])->name('datagis.show');
    Route::post('/data-gis/update/{id_bencana}', [DataGISControllers::class, 'update'])->name('datagis.update');
    Route::get('/data-gis/delete/{id_bencana}', [DataGISControllers::class, 'delete'])->name('datagis.delete');

    // Data Kecamatan dan Kelurahan
    Route::get('/kecamatan', [KecKelControllers::class, 'indexKecamatan'])->name('keckel.index');
    Route::get('/kecamatan/create', [KecKelControllers::class, 'createKecamatan'])->name('keckel.create');
    // Store
    Route::post('/kecamatan/store', [KecKelControllers::class, 'storeKecamatan'])->name('keckel.store');
    Route::post('/kecamatan/store/kelurahan', [KecKelControllers::class, 'storeKelurahan'])->name('keckel.storeKelurahan');
    // Show
    Route::get('/kecamatan/show/{id_kecamatan}', [KecKelControllers::class, 'show'])->name('keckel.show');
    // Update
    Route::post('/kecamatan/update/{id_kecamatan}', [KecKelControllers::class, 'update'])->name('keckel.update');
    Route::post('/kecamatan/update/kelurahan/{id_kelurahan}', [KecKelControllers::class, 'updateKelurahan'])->name('keckel.updateKelurahan');
    // Delete
    Route::delete('/kecamatan/delete/{id_kecamatan}', [KecKelControllers::class, 'delete'])->name('keckel.delete');
    Route::get('/kecamatan/delete/{id_kelurahan}', [KecKelControllers::class, 'deleteKelurahan'])->name('keckel.deleteKelurahan');

});

