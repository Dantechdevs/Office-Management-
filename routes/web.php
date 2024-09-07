<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfficeController;
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

Route::get('/', function () {
    return view('welcome');
});
// testing Layouts
Route::view('/example-page','example-page');
Route::view('/example-auth','example-auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// Admin Group Middleware
Route::middleware(['auth' , 'role:admin'])->group(function (){
Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
Route::get('/admin/logout',[AdminController::class,'AdminLogout'])->name('admin.logout');
Route::get('/admin/profile',[AdminController::class, 'AdminProfile'])->name('admin.profile');
Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

}); // end  Group Admin Middleware

// Office Group Middleware
Route::middleware(['auth' , 'role:office'])->group(function (){
Route::get('/office/dashboard',[OfficeController::class,'OfficeDashboard'])->name('office.dashboard');

}); // end  Group Office Middleware

Route::get('/admin/login',[AdminController::class,'AdminLogin'])->name('admin.login');
