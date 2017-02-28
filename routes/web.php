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

                Route::group(array('prefix' => 'tick-circle-true-false'), function () {
                    Route::get('/{class_code}', 'backend\author\TickCircleTrueFalseController@index')
                        ->name('backend.manager.author.tick-circle-true-false');

                    Route::get('/create/{code_user}/{class_code}', 'backend\author\TickCircleTrueFalseController@create')
                        ->name('backend.manager.author.tick-circle-true-false.create');

                    Route::post('/store', 'backend\author\TickCircleTrueFalseController@store')
                        ->name('backend.manager.author.tick-circle-true-false.store');
                });

                Route::group(array('prefix' => 'multiple-choice'), function () {
                    Route::get('/{class_code}', 'backend\author\MultipleChoiceController@index')
                        ->name('backend.manager.author.multiple-choice');

                    Route::get('/create/{code_user}/{class_code}', 'backend\author\MultipleChoiceController@create')
                        ->name('backend.manager.author.multiple-choice.create');

                    Route::post('/store', 'backend\author\MultipleChoiceController@store')
                        ->name('backend.manager.author.multiple-choice.store');
                });

                Route::group(array('prefix' => 'classify-word'), function () {
                    Route::get('/{class_code}', 'backend\author\ClassifyWordController@index')
                        ->name('backend.manager.author.classify-word');

                    Route::get('/create/{code_user}/{class_code}', 'backend\author\ClassifyWordController@create')
                        ->name('backend.manager.author.classify-word.create');

                    Route::post('/store', 'backend\author\ClassifyWordController@store')
                        ->name('backend.manager.author.classify-word.store');
                });

                Route::group(array('prefix' => 'complete-word'), function () {
                    Route::get('/{class_code}', 'backend\author\CompleteWordController@index')
                        ->name('backend.manager.author.complete-word');

                    Route::get('/create/{code_user}/{class_code}', 'backend\author\CompleteWordController@create')
                        ->name('backend.manager.author.complete-word.create');

                    Route::post('/store', 'backend\author\CompleteWordController@store')
                        ->name('backend.manager.author.complete-word.store');
                });

                Route::group(array('prefix' => 'find-errors'), function () {
                    Route::get('/{class_code}', 'backend\author\FindErrorController@index')
                        ->name('backend.manager.author.find-errors');

                    Route::get('/create/{code_user}/{class_code}', 'backend\author\FindErrorController@create')
                        ->name('backend.manager.author.find-errors.create');

                    Route::post('/store', 'backend\author\FindErrorController@store')
                        ->name('backend.manager.author.find-errors.store');
                });

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
                Route::get('/get-unit-class', 'frontend\TeacherController@get_unit_class')
                    ->name('frontend.teacher.elementary.get.unit');
                Route::get('/get-examtype-ofskill', 'frontend\TeacherController@get_examtype_skill')
                    ->name('frontend.teacher.elementary.get.examtype.ofSkill');

                Route::post('/create', 'frontend\TeacherController@store')->name('frontend.teacher.elementary.store');
                Route::get('/show', 'frontend\TeacherController@show')->name('frontend.teacher.elementary.show');

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
            Route::get('/redirect-to-test-page/{level_id}', 'frontend\StudentController@redirectToTest')
                ->name('frontend.dashboard.student.redirect');

            Route::post('handling-result', 'frontend\StudentController@hanglingResult')
                ->name('frontend.student.testing.handle');

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
