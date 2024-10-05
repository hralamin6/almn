<?php

use App\Models\Setup;
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
Route::get('/test', \App\Livewire\TestComponent::class)->name('test');
Route::get('/arabic-words', \App\Livewire\ArabicWordComponent::class)->name('words');
Route::get('/my-words', \App\Livewire\MyWordComponent::class)->name('my-words');
Route::get('/arabic-words/practise', \App\Livewire\PractiseComponent::class)->name('practise');
Route::get('/arabic-words/exam', \App\Livewire\ExamComponent::class)->name('exam');

Route::middleware('admin')->group(function () {
    Route::get('/dashboard', \App\Livewire\HomeComponent::class)->name('dashboard.home');
    Route::get('/dashboard/update-password', \App\Livewire\Admin\PasswordUpdateComponent::class)->name('dashboard.update.password');
    Route::get('/dashboard/update-profile', \App\Livewire\Admin\ProfileUpdateComponent::class)->name('dashboard.update.profile');
    Route::get('/dashboard/vendor-details', \App\Livewire\Admin\VendorDetailsComponent::class)->name('dashboard.vendor.details');
    Route::get('/dashboard/users', \App\Livewire\Admin\UserComponent::class)->name('dashboard.users');
    Route::get('/dashboard/categories', \App\Livewire\Admin\CategoryComponent::class)->name('dashboard.categories');
});
Route::get('dashboard/login', \App\Livewire\Auth\Adminlogin::class)->name('dashboard.login');
Route::middleware('guest')->group(function () {
    Route::get('login', \App\Livewire\Auth\Login::class)->name('login');
    Route::get('register', \App\Livewire\Auth\Register::class)->name('register');
    Route::get('auth/{provider}/redirect', [\App\Http\Controllers\SocialiteController::class, 'loginSocial'])->name('socialite.auth');
    Route::get('auth/{provider}/callback', [\App\Http\Controllers\SocialiteController::class, 'callbackSocial'])->name('socialite.callback');

});
Route::get('password/reset', \App\Livewire\Auth\Email::class)
    ->name('email');

Route::get('password/reset/{token}', \App\Livewire\Auth\Reset::class)
    ->name('reset');

Route::middleware('auth')->group(function () {
    Route::get('/wishlists', \App\Livewire\WishlistComponent::class)->name('wishlists');
    Route::get('/quizzes', \App\Livewire\QuizComponent::class)->name('quizzes');

    Route::get('email/verify', \App\Livewire\Auth\Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', \App\Livewire\Auth\Confirm::class)
        ->name('confirm');
});
Route::get('/pdf', function () {
        $items= User::get();
        $setup = Setup::first();
        $pdf = Pdf::loadView('pdf.users', compact('items', 'setup'));
        return $pdf->stream('users.pdf');
});
Route::get('/users', function () {
    $items= User::get();
    $setup = Setup::first();

    return view('pdf.users', compact('items', 'setup'));
});
Route::get('/dashboard/logout', function () {
    \Illuminate\Support\Facades\Auth::guard('admin')->logout();
    return redirect(route('dashboard.home'));
})->name('dashboard.logout');
Route::get('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect(route('home'));
})->name('logout');
