<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
Route::middleware('web')->domain('admin.' . env('APP_DOMAIN'))->namespace('Admin')->group(function () {
	
    Route::get('/', 'DashboardController@index')->name('main');

    Route::prefix('personal')->namespace('Personal')->group(function () {
        Route::prefix('health')->namespace('Health')->group(function () {
            Route::resource('health_check', 'HealthCheckController');
            Route::resource('healthy_diet', 'HealthyDietController');
            Route::resource('gym', 'GymController');
        });
        Route::prefix('economy')->namespace('Economy')->group(function () {
            Route::resource('money', 'MoneyController');
            Route::resource('invest', 'InvestController');
        });
        Route::prefix('education')->namespace('Education')->group(function () {
            Route::resource('books', 'BooksController');
            Route::resource('learning', 'LearningController');
            Route::resource('orientation', 'OrientationController');
        });
        Route::prefix('culture')->namespace('Culture')->group(function () {
            Route::resource('note', 'NoteController');
            Route::resource('diary', 'DiaryController');
        });
    });

    Route::prefix('coin')->group(function () {
        Route::resource('ncoin', 'CoinNormalController');
    });

    Route::prefix('invest')->group(function () {
        Route::resource('invest', 'InvestmentController');
    });

    Route::prefix('schedule')->group(function () {
        Route::resource('schedule', 'ScheduleController');
    });

    Route::prefix('users')->group(function () {
        Route::resource('users', 'UserController');
    });

    Route::prefix('role')->group(function () {
        Route::resource('role', 'RoleController');
    });

    Route::prefix('static')->group(function () {
        Route::resource('static', 'StaticController');
    });

    Route::prefix('config')->group(function () {
        Route::resource('config', 'ConfigController');
    });

    Route::prefix('profile')->group(function () {
        Route::resource('profile', 'ProfileController');
    });

    Route::prefix('mailbox')->group(function () {
        Route::resource('mailbox', 'ailboxController');
    });
});

Route::middleware('auth')->domain(env('APP_DOMAIN'))->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::middleware('guest')->domain(env('APP_DOMAIN'))->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    
    // Authorization
    Route::get('/login', [
        'as' => 'auth.login.form',
        'uses' => 'Auth\SessionController@getLogin'
    ]);
    Route::post('/login', [
        'as' => 'auth.login.attempt',
        'uses' => 'Auth\SessionController@postLogin'
    ]);
    Route::get('/logout', [
        'as' => 'auth.logout',
        'uses' => 'Auth\SessionController@getLogout'
    ]);
    
    // Registration
    Route::get('register', [
        'as' => 'auth.register.form',
        'uses' => 'Auth\RegistrationController@getRegister'
    ]);
    Route::post('register', [
        'as' => 'auth.register.attempt',
        'uses' => 'Auth\RegistrationController@postRegister'
    ]);
    
    // Activation
    Route::get('activate/{code}', [
        'as' => 'auth.activation.attempt',
        'uses' => 'Auth\RegistrationController@getActivate'
    ]);
    Route::get('resend', [
        'as' => 'auth.activation.request',
        'uses' => 'Auth\RegistrationController@getResend'
    ]);
    Route::post('resend', [
        'as' => 'auth.activation.resend',
        'uses' => 'Auth\RegistrationController@postResend'
    ]);
    
    // Password Reset
    Route::get('password/reset/{code}', [
        'as' => 'auth.password.reset.form',
        'uses' => 'Auth\PasswordController@getReset'
    ]);
    Route::post('password/reset/{code}', [
        'as' => 'auth.password.reset.attempt',
        'uses' => 'Auth\PasswordController@postReset'
    ]);
    Route::get('password/reset', [
        'as' => 'auth.password.request.form',
        'uses' => 'Auth\PasswordController@getRequest'
    ]);
    Route::post('password/reset', [
        'as' => 'auth.password.request.attempt',
        'uses' => 'Auth\PasswordController@postRequest'
    ]);
    
    // Users
    Route::resource('users', 'UserController');
    
    // Roles
    Route::resource('roles', 'RoleController');
    
    // Dashboard
    Route::get('dashboard', [
        'as' => 'dashboard',
        'uses' => function () {
            return view('centaur.dashboard');
        }
    ]);
});

    
