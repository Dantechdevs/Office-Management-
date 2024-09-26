<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\backend\SchoolController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AdminController::class,'AdminLogin'])->name('home');
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
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
}); // end Group Admin Middleware

// Office Group Middleware
Route::middleware(['auth' , 'role:office'])->group(function (){
    Route::get('/office/dashboard',[OfficeController::class,'OfficeDashboard'])->name('office.dashboard');
}); // end Group Office Middleware

// Admin login Routes
Route::get('/admin/login',[AdminController::class,'AdminLogin'])->name('admin.login');
// End of Admin login

// Schools Group Middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('schools', [SchoolController::class, 'index'])->name('schools.index');
    Route::get('schools/primary', [SchoolController::class, 'primarySchool'])->name('schools.primary');
    Route::get('schools/secondary', [SchoolController::class, 'secondarySchool'])->name('schools.secondary');

    // Route for displaying the form to add a new school
    Route::get('schools/add', [SchoolController::class, 'create'])->name('add.school');
    Route::post('schools/store', [SchoolController::class, 'store'])->name('schools.store');

    // Update and Delete Routes for Schools
    Route::get('schools/edit/{school}', [SchoolController::class, 'edit'])->name('edit.school');
    Route::post('schools/update/{school}', [SchoolController::class, 'update'])->name('update.school');
    Route::delete('schools/delete/{school}', [SchoolController::class, 'destroy'])->name('delete.school');


    // Route for displaying a specific school
    Route::get('/schools/secondary', [SchoolController::class, 'showSecondarySchools'])->name('schools.secondary');


});

