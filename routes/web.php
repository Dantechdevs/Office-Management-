<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\backend\SchoolController;
use App\Http\Controllers\backend\TeacherController;
use App\Http\Controllers\backend\DigitalController; // Add this line
use App\Http\Controllers\backend\RecordController;
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

Route::get('/', [AdminController::class, 'AdminLogin'])->name('home');

// Testing Layouts
Route::view('/example-page', 'example-page');
Route::view('/example-auth', 'example-auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Admin Group Middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
}); // end Group Admin Middleware

// Office Group Middleware
Route::middleware(['auth', 'role:office'])->group(function () {
    Route::get('/office/dashboard', [OfficeController::class, 'OfficeDashboard'])->name('office.dashboard');
}); // end Group Office Middleware

// Admin login Routes
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
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

// Digital Devices Group Middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(DigitalController::class)->group(function () {
        Route::get('/all/digitals', 'index')->name('all.digitals'); // List all digital devices
        Route::get('/add/digital', 'create')->name('add.digital'); // Show form to add a new digital device
        Route::post('/store/digital', 'store')->name('store.digital'); // Store new digital device
        Route::get('/edit/digital/{id}', 'edit')->name('edit.digital'); // Show form to edit a digital device
        Route::put('/update/digital/{id}', 'update')->name('update.digital'); // Update digital device
        Route::delete('/delete/digital/{id}', 'destroy')->name('delete.digital'); // Delete digital device

        // Specific device type routes
        Route::get('/learner-devices', 'showLearnerDevices')->name('show.learner.devices'); // Learner Devices
        Route::get('/teacher-devices', 'showTeacherDevices')->name('show.teacher.devices'); // Teacher Devices
        Route::get('/routers', 'showRouters')->name('show.routers'); // Routers
        Route::get('/hard-disks', 'showHardDisks')->name('show.hard.disks'); // Hard Disks
        Route::get('/projectors', 'showProjectors')->name('show.projectors'); // Projectors
    });
}); // end Group Digital Devices Middleware

// Teacher Group Middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(TeacherController::class)->group(function () {
        Route::get('/all/teacher', 'AllTeacher')->name('all.teacher');
        Route::get('/add/teacher', 'AddTeacher')->name('add.teacher');
        Route::post('/store/teacher', [TeacherController::class, 'store'])->name('store.teacher');
        Route::get('/edit/teacher/{id}', 'EditTeacher')->name('edit.teacher');
        Route::put('/update/teacher/{id}', [TeacherController::class, 'UpdateTeacher'])->name('update.teacher');
        Route::get('/delete/teacher/{id}', 'DeleteTeacher')->name('delete.teacher');
    }); // end Group Teacher Middleware

  // Records Group routes
  Route::controller(RecordController::class)->group(function () {
    Route::get('/all/records', 'AllRecords')->name('all.records'); // Display all records
    Route::get('/add/record', 'create')->name('add.record'); // Show form to add a new record
    Route::post('/store/record', 'store')->name('store.record'); // Store a new record
    Route::get('/edit/record/{id}', 'edit')->name('edit.record'); // Show form to edit a record
    Route::put('/update/record/{id}', 'update')->name('update.record'); // Update a record
    Route::post('/import/records', 'import')->name('import.records'); // Import document
    Route::post('/export/records', 'export')->name('export.records'); // Export records
    Route::post('/export/records', 'export')->name('export.record'); // Export records
    Route::delete('/delete/record/{id}', 'delete')->name('delete.record'); // Delete a record
});
});
