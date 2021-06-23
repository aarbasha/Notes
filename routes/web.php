<?php

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', ]
    ], function(){

        //صفحة العرض الرئيسية
        Route::view('/', 'index');
        // صفحة مابعد تسجيل الدخول
        Route::get('/home', 'HomeController@index')->name('home');
        // صفحة تحتوي على عددمن الصفحات
        Route::resource('pages', 'PageController');
        // الصفحة  الملاحظات التي يمكن الولوج منها من خلال صفحة
        Route::resource('notes', 'NoteController');
        // صفحة ملاحظات فردة فقط من دون صفحات
        Route::resource('notes_only', 'NotesonlyController');
        // عرض صفحة المهام
        Route::resource('tasks', 'TaskController');
        //#######################################################################
        // تفعيل زر البحث الصفحة الرئيسية
        Route::get('search', 'searchController@home')->name('search.home');
        // تفعيل زر البحث في الصفحات
        Route::get('search', 'searchController@pages')->name('search.pages');
        // تفعيل زر البحث في الملاحظات
        Route::get('search', 'searchController@notes')->name('search.notes');
        // تفعيل زر البحث في الملاحظات المفردة
        Route::get('search', 'searchController@notes_only')->name('search.notes_only');
        // تفعيل زر البحث في المهام
        Route::get('search', 'searchController@taskes')->name('search.taskes');
        //########################################################################
        //تمرير ملاحظة ضمن صفحة معينة
        Route::get('pages/{page}/notes','PageController@nestedpage');
        // المصادقة
        Auth::routes();
    });
