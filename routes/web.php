<?php

use App\Http\Livewire\AdminComponent;
use App\Http\Livewire\UserComponent;
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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', UserComponent::class)->name('user');
    Route::get('/admin', AdminComponent::class)->name('admin');
});
