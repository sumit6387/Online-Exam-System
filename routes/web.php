<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// for admin's all route
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin','Admin@index')->middleware('admin');
Route::get('/admin/exam_category','Admin@exam_category')->middleware('admin');
Route::post('admin/add_new_category','Admin@add_new_category')->middleware('admin');
Route::get('admin/delete_category/{id}','Admin@delete_category')->middleware('admin');
Route::get('admin/edit_category/{id}','Admin@edit_category')->middleware('admin');
Route::post('admin/edit_new_category','Admin@edit_new_category')->middleware('admin');
Route::get('/admin/category_status/{id}','Admin@category_status')->middleware('admin');
Route::get('admin/manage_exam','Admin@manage_exam')->middleware('admin');
Route::post('admin/add_new_exam','Admin@add_new_exam')->middleware('admin');
Route::get('admin/edit_exam/{id}','Admin@edit_exam')->middleware('admin');
Route::get('admin/exam_status/{id}','Admin@exam_status')->middleware('admin');
Route::post('admin/edit_new_Exam','Admin@edit_new_Exam')->middleware('admin');
Route::get('admin/delete_exam/{id}','Admin@delete_exam')->middleware('admin');
Route::get('admin/manage_students','Admin@manage_students')->middleware('admin');
Route::post('admin/add_student','Admin@add_student');
Route::get('admin/delete_student/{id}','Admin@delete_student')->middleware('admin');
Route::get('admin/edit_student/{id}','Admin@edit_student')->middleware('admin');
Route::get('admin/Student_status/{id}','Admin@Student_status')->middleware('admin');
Route::post('admin/edit_new_student','Admin@edit_new_student')->middleware('admin');
Route::get('admin/manage_portal','Admin@manage_portal')->middleware('admin');
Route::post('admin/add_portal','Admin@add_portal')->middleware('admin');
Route::get('admin/delete_portal/{id}','Admin@delete_portal')->middleware('admin');
Route::get('admin/portal_status/{id}','Admin@portal_status')->middleware('admin');
Route::get('admin/edit_portal/{id}','Admin@edit_portal')->middleware('admin');
Route::post('admin/edit_new_portal','Admin@edit_new_portal')->middleware('admin');
Route::get('admin/add_question/{id}','Admin@add_question')->middleware('admin');
Route::post('admin/add_new_question','Admin@add_new_question')->middleware('admin');
Route::get('admin/delete_question/{id}','Admin@delete_question')->middleware('admin');
Route::get('admin/question_status/{id}','Admin@question_status')->middleware('admin');
Route::get('admin/edit_question/{id}','Admin@edit_question')->middleware('admin');
Route::post('admin/edit_new_question','Admin@edit_new_question')->middleware('admin');
Route::get('admin/logout','Admin@logout');



// portal 
Route::get('portal/portal_signup','PortalController@portal_signup');
Route::post('portal/signup_sub','PortalController@signup_sub');
Route::get('portal/login','PortalController@login');
Route::post('portal/login_sub','PortalController@login_sub');


Route::get('portal/dashboard','PortalOperation@dashboard')->middleware('portal');
Route::get('portal/exam_form/{id}','PortalOperation@exam_form')->middleware('portal');
Route::post('portal/exam_form_submit','PortalOperation@exam_form_submit')->middleware('portal');
Route::get('portal/print/{id}','PortalOperation@print')->middleware('portal');
Route::get('portal/update_form','PortalOperation@update_form')->middleware('portal');
Route::get('portal/student_exam_info','PortalOperation@student_exam_info')->middleware('portal');
Route::post('portal/update_form_submit','PortalOperation@update_form_submit')->middleware('portal');
Route::get('portal/logout','PortalOperation@logout');

Route::get('student/login','StudentController@login');
Route::post('student/login_sub','StudentController@login_sub');
Route::get('student/dashboard','StudentOperation@dashboard')->middleware('student');
Route::get('student/logout','StudentOperation@logout');
Route::get('student/exams','StudentOperation@exams')->middleware('student');
Route::get('student/join_exam/{exam_id}','StudentOperation@join_exam')->middleware('student');
Route::post('student/submit_answer','StudentOperation@submit_answer')->middleware('student');
Route::get('student/result/{id}','StudentOperation@result')->middleware('student');