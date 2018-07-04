<?php

// Route::middleware('admin')->group(function(){
//     // Route::get('/backend',function(){
//     //     return 'Route is Reached...';
//     //     // This is /public/admin/backend
//     // });
    
// });

Route::get('/dashboard','BackEndController@dashboard')->name('dashboard');
Route::get('/contact/read/{id}','ContactController@make_contact_read')->name('contact.make.read');

Route::resource('product','ProductController');
Route::resource('contact', 'ContactController');