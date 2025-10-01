<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InstructorsController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\EnrollController;


Route::get('/login',[LoginController::class,"LoadLogin"])->name('login.load');
Route::post('/login/post',[LoginController::class,"CheckLogin"])->name('login.post');
Route::post('/logout',[LoginController::class,"logout"])->name('logout');

Route::get('/register',[RegisterController::class,"LoadRegister"])->name('register.load');
Route::post('/register/post',[RegisterController::class,"registerPost"])->name('register.post');


Route::get('/',[HomeController::class,"loadHome"])->name('home.load');
Route::get('/admin/dashboard',[DashboardController::class,"loadDashboard"])->name('admin.dashboard');
Route::post('/admin/courses/add',[DashboardController::class,"addCourse"])->name('course.add');
Route::delete('/admin/courses/delete/{id}',[DashboardController::class,"deleteCourse"])->name('course.delete');
Route::get('/admin/courses/edit/{id}',[DashboardController::class,"editCourse"])->name('course.edit');
Route::patch('/admin/courses/update/{id}',[DashboardController::class,"updateCourse"])->name('course.update');
Route::get('/courses/all/',[DashboardController::class,"getAllCourses"])->name('courses.more');

Route::get('/courses/filter',[DashboardController::class,"FilterCourses"])->name('courses.filter');


Route::get('/home/courses/view/{id}',[DashboardController::class,"viewCourse"])->name('course.view');

Route::prefix("enroll")->middleware('IsLoggedInsStudent')->group(function(){
    Route::post('/{id}',[EnrollController::class,"enrollCourse"])->name('course.enroll');
    
});

Route::get('/admin/Students',[StudentsController::class,"loadStudents"])->name('admin.Students');


Route::get('/admin/instructors',[InstructorsController::class,"loadInstructors"])->name('admin.instructors');

Route::delete('/admin/instructors/delete/{id}',[InstructorsController::class,"deleteInstructor"])->name('instructor.delete');
Route::get('/admin/instructors/edit/{id}',[InstructorsController::class,"editInstructor"])->name('instructor.edit');
Route::patch('/admin/instructors/update/{id}',[InstructorsController::class,"updateInstructor"])->name('instructor.update');

Route::post('/admin/instructors/add',[InstructorsController::class,"AddInstructor"])->name('instructor.add');




Route::get('/admin/categories',[CategoryController::class,"loadCategories"])->name('admin.categories');
Route::post('/admin/categories/add',[CategoryController::class,"addCategory"])->name('category.add');
Route::delete('/admin/categories/delete/{id}',[CategoryController::class,"DeleteCategory"])->name('category.delete');

Route::get('/admin/categories/edit/{id}',[CategoryController::class,"editCategory"])->name('category.edit');
Route::patch('/admin/categories/update/{id}',[CategoryController::class,"UpdateCategory"])->name('category.update');


Route::get('/admin/admins',[AdminsController::class,"loadAdmins"])->name('admin.admins');


Route::get('/sendEmail',[SendEmailController::class,"sendVerificationEmail"])->name('send.email');




