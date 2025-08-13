<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InstructorsController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\HomeController;




Route::get('/',[HomeController::class,"loadHome"])->name('home.load');
Route::get('/admin/dashboard',[DashboardController::class,"loadDashboard"])->name('admin.dashboard');
Route::post('/admin/courses/add',[DashboardController::class,"addCourse"])->name('course.add');
Route::delete('/admin/courses/delete/{id}',[DashboardController::class,"deleteCourse"])->name('course.delete');
Route::get('/admin/courses/edit/{id}',[DashboardController::class,"editCourse"])->name('course.edit');
Route::patch('/admin/courses/update/{id}',[DashboardController::class,"updateCourse"])->name('course.update');


Route::get('/home/courses/view/{id}',[DashboardController::class,"viewCourse"])->name('course.view');



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





