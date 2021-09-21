<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;


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

Route::get('/users', function (Request $request) {
    return $request;
});

Route::redirect('/here', '/there', 301);

Route::get('/here', function () {
    return "This is here page!";
});

Route::get('/there', function () {
    return "This is there page!";
});

Route::get('/login', function () {
    return view('login');
});

Route::get('users/{id}', function ($id) {
    return 'User'.$id;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    // return "Hello, My birthday is "+$postId+" / "+$commentId+"";
    return $postId + $commentId;
});

Route::get('/user/{name?}', function ($name = null) {
    return "NULL";
});

Route::get('/user/{name?}', function ($name = "PIP") {
    return $name;
});

Route::get('/test/{name}', function ($name) {
    return $name;
})->where('name', '[A-Za-z]+');

// Route::get('/test/{id}', function ($id) {
//     return $id;
// })->where('id', '[0-9]+');

Route::get('/test/{id}/{name}', function ($id, $name) {
    return "My name is $name and I am $id years old.";
})->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);


Route::get('/user/{id}/{name}', function ($id, $name) {
    return "$id + $name";
})->whereNumber('id')->whereAlpha('name');

Route::get('/aaa/{name}', function ($name) {
    return $name;
})->whereAlphaNumeric('name');

Route::get('/search/{search}', function ($search) {
    return $search;
})->where('search', '.*');

Route::get('/user/profile', function () {

})->name('profile');

Route::prefix('admin')->group(function () {
    Route::get('/first', function () {
        return "first_Prefix";
    });
    Route::get('/second', function () {
        return "second_Prefix";
    });
});

Route::name('admin.')->group(function () {
    Route::get('/prefix', function () {
        return "PREFIX";
    })->name('prefix');
});

Route::get('/Users/{user}', function (User $user) {
    return $user;
});

Route::get('/bindings/{binding}', [Controller::class, 'show']);