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


Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', 'DashboardController@redirectUrl')->name('dashboard.redirect.login');

    Route::group(array('prefix' => 'backend'), function () {

        // Admin
        Route::group(array('middleware' => 'checkRole:AD'), function () {
            // Manager Users backend
            Route::group(array('prefix' => 'manager-users'), function () {

                Route::get('/', 'backend\UserController@index')->name('backend.manager.users.index');
                Route::post('/delete', [
                    'as' => 'backend.manager.users.delete',
                    'uses' => 'backend\UserController@destroy'
                ]);
            });

            // Manager Roles - permissions backend
            Route::group(array('prefix' => 'manager-roles-permissions'), function () {

                Route::get('/',
                    'backend\RolePermissionsController@index')->name('backend.manager.roles.permissions.index');
                Route::post('/delete-roles', [
                    'as' => 'backend.manager.roles.delete',
                    'uses' => 'backend\RolePermissionsController@destroyRole'
                ]);
                Route::post('/delete-permissions', [
                    'as' => 'backend.manager.permissions.delete',
                    'uses' => 'backend\RolePermissionsController@destroyPermission'
                ]);
            });

        });

        // Author
        Route::group(array('middleware' => 'checkRole:AT'), function () {
            // Manager Users backend
            Route::group(array('prefix' => 'manager-author'), function () {

                Route::get('/', 'backend\AuthorController@index')->name('backend.manager.author.index');

                // go to elementary
                Route::group(array('prefix' => 'grade'), function () {
                    Route::get('/{class_code}', 'backend\AuthorController@grade')->name('backend.author.grade');
                });

                Route::get('/underlines',
                    'backend\AuthorController@underlines')->name('backend.manager.author.underlines');

                Route::group(array('prefix' => 'answer-question'), function () {
                    Route::get('/{class_code}', 'backend\author\AnswerQuestionsController@index')
                        ->name('backend.manager.author.answer-question');

                    Route::get('/create/{code_user}/{class_code}', 'backend\author\AnswerQuestionsController@create')
                        ->name('backend.manager.author.answer-question.create');
//                    Route::get('/create-teacher/{class_code}', 'backend\author\AnswerQuestionsController@create_teacher')
//                        ->name('backend.manager.author.answer-question.create-teacher');

                    Route::post('/store', 'backend\author\AnswerQuestionsController@store')
                        ->name('backend.manager.author.answer-question.store');


                });

                Route::get('/classify-word/{class_code}',
                    'backend\AuthorController@classify_words')->name('backend.manager.author.classify-word');
                Route::get('/complete-word/{class_code}',
                    'backend\AuthorController@complete_words')->name('backend.manager.author.complete-word');
                Route::get('/find-errors/{class_code}',
                    'backend\AuthorController@find_errors')->name('backend.manager.author.find-errors');
                Route::get('/multiple-choice/{class_code}',
                    'backend\AuthorController@multiple_choice')->name('backend.manager.author.multiple-choice');
                Route::get('/tick-cricle-true-false/{class_code}',
                    'backend\AuthorController@tick_circle_true_false')->name('backend.manager.author.tick-cricle-true-false');
            });

        });


    });

    Route::group(array('prefix' => 'frontend'), function () {

        // Teacher frontend
        Route::group(array('prefix' => 'teacher', 'middleware' => 'checkRole:TC'), function () {

            // dashboard
            Route::get('/', 'frontend\TeacherController@index')->name('frontend.teacher.index');

            // go to elementary
            Route::group(array('prefix' => 'elementary'), function () {
                Route::get('/', 'frontend\TeacherController@elementary')->name('frontend.teacher.elementary');

                Route::get('/create', 'frontend\TeacherController@create')->name('frontend.teacher.elementary.create');

            });

            // go to secondary
            Route::group(array('prefix' => 'secondary'), function () {
                Route::get('/', 'frontend\TeacherController@secondary')->name('frontend.teacher.secondary');

                Route::get('/create', 'frontend\TeacherController@create')->name('frontend.teacher.secondary.create');

            });

            // go to highschool
            Route::group(array('prefix' => 'highschool'), function () {
                Route::get('/', 'frontend\TeacherController@highschool')->name('frontend.teacher.highschool');

                Route::get('/create', 'frontend\TeacherController@create')->name('frontend.teacher.highschool.create');

            });

        });

        // STUDENT FRONTEND
        Route::group(array('prefix' => 'student', 'middleware' => 'checkRole:ST'), function () {

            // dashboard
            Route::get('/', 'frontend\StudentController@index')->name('frontend.dashboard.student.index');

        });

    });

});

//Route::group(array('middleware' => 'guest'), function () {
// dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');
//});

Auth::routes();

Route::get('/403', function () {
    return view('errors.403');
});
