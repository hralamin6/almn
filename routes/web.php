<?php

use App\Models\setup;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use misterspelik\LaravelPdf\Facades\Pdf;

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

Route::get('/', \App\Livewire\HomeComponent::class)->name('home');
//Route::middleware('auth')->group(function () {
    Route::get('/admin/users', \App\Livewire\Admin\BloggerComponent::class)->name('admin.users');
//    Route::get('/admin/users', \App\Livewire\Admin\UserComponent::class)->name('admin.users');
    Route::get('/admin/categories', \App\Livewire\Admin\CategoryComponent::class)->name('admin.categories');
//});
Route::middleware('guest')->group(function () {
    Route::get('login', \App\Livewire\Auth\Login::class)
        ->name('login');

    Route::get('register', \App\Livewire\Auth\Register::class)
        ->name('register');
});
Route::get('password/reset', \App\Livewire\Auth\Email::class)
    ->name('email');

Route::get('password/reset/{token}', \App\Livewire\Auth\Reset::class)
    ->name('reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', \App\Livewire\Auth\Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', \App\Livewire\Auth\Confirm::class)
        ->name('confirm');
});
Route::get('/pdf', function () {
    return response()->streamDownload(function () {
        $items= User::get();
        $setup = Setup::first();
        $pdf = Pdf::loadView('pdf.users', compact('items', 'setup'));
        return $pdf->stream('users.pdf');
    }, 'users.pdf');


});
