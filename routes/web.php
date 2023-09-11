<?php


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DocumentsController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\UsersDepartmentsController;
use App\Http\Controllers\Admin\UsersPermissionsController;
use App\Http\Controllers\Admin\UsersRolesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class,'index'])->name('home');

Route::middleware('auth')
    ->group(function () {
        Route::get('/posts/{post}', [
            PostsController::class,'show'
        ])->name('posts.show');

        Route::get('/categories/{category}', [
            CategoriesController::class,'show'
        ])->name('categories.show');

        Route::get('/tags/{tag}', [
            TagsController::class, 'show'
        ])->name('tags.show');

        Route::post('/show', [
            HomeController::class,'show'
        ])->name('home.show');
});

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function() {

        Route::resource('posts',
            PostController::class
        )->except('show');

        Route::resource('users',
            UsersController::class);

        Route::resource('roles',
            RolesController::class
        )->except('show');

        Route::resource('permissions',
            PermissionsController::class
        )->only('index','edit','update');

        Route::resource('departments',
            DepartmentController::class
        );

        Route::resource('categories',
            CategoryController::class
        );

        Route::middleware('role:Admin')
            ->put('users/{user}/roles', [
                UsersRolesController::class,'update'
            ])->name('users.roles.update');

        Route::middleware('role:Admin')
            ->put('users/{user}/permissions', [
                UsersPermissionsController::class,'update'
            ])->name('users.permissions.update');

        Route::middleware('role:Admin')
            ->put('users/{user}/departments', [
                UsersDepartmentsController::class,'update'
            ])->name('users.departments.update');

        Route::post('posts/{post}/documents', [
            DocumentsController::class,'store'
        ])->name('posts.documents.store');

        Route::delete('documents/{document}', [
            DocumentsController::class,'destroy'
        ])->name('documents.destroy');

    });
