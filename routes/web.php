<?php

use Carbon\Factory;
use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

//how to fill the users table with the factory method
// Route::get('/user', function(){
//     App\Models\User::factory()->count(3)->create();});
//filling information on the address table
// Route::get('/user', function(){
//     \App\Models\Address::create([
//         'user_id'=>4,
//         'country'=>'China'
//     ]);
//     \App\Models\Address::create([
//         'user_id'=>5,
//         'country'=>'Korea'
//     ]);
//     \App\Models\Address::create([
//         'user_id'=>6,
//         'country'=>'Italy'
//     ]);
//     \App\Models\Address::create([
//         'user_id'=>7,
//         'country'=>'Spain'
//     ]);
// });

//one to one relationship
// Route::get('/user', function(){

//     $users=\App\Models\User::all();
//     return view('users.index', compact('users'));
// });

//one to may relationship
Route::get('/user', function () {

    $users = \App\Models\User::all();
    //displaying users who has posts only (you include the has method)
    // $users = \App\Models\User::has('posts')->get();
//using a querry to fetch those user who have two or more posts
// //displaying users who doesn't have posts
// $users = \App\Models\User::has('posts', '>=', 2)->get();
//displaying users who doesn't have posts
// $users = \App\Models\User::doesntHave('posts')->get();
    //adding a post to the current user
    // $users[1]->posts()->create([
    //     'title' => 'programming'
    // ]);
    // $users[2]->posts()->create([
    //     'title' => 'nice work'
    // ]);
    // $users[3]->posts()->create([
    //     'title' => 'nice code'
    // ]);
    // $users[4]->posts()->create([
    //     'title' => 'nice code'
    // ]);
    return view('users.index', compact('users'));
});

Route::get('/posts', function () {
    // \App\Models\Post::create([
    //     'user_id'=>1,
    //     'title'=>'hello world'
    // ]);
    // \App\Models\Post::create([
    //     'user_id'=>2,
    //     'title'=>'hello developers'
    // ]);
    // \App\Models\Post::create([
    //     'user_id'=>3,
    //     'title'=>'code challenge'
    // ]);
    // \App\Models\Post::create([
    //     'user_id'=>4,
    //     'title'=>'code bootcamp'
    // ]);
    $posts = \App\Models\Post::get();
    return view('posts.index', compact('posts'));
});

Route::get('/Tags', function () {
    // \App\Models\Tag::create([
    //     'name'=>'javascript'
    // ]);
    // \App\Models\Tag::create([
    //     'name'=>'html'
    // ]);
    // \App\Models\Tag::create([
    //     'name'=>'python'
    // ]);
    // \App\Models\Tag::create([
       
    //     'name'=>'NODE JS'
    // ]);

    $tag = \App\Models\Tag::first();
    $post = \App\Models\Post::first();
    $post = tags()->attach($tag);
    // $posts = \App\Models\Tag::get();
    // return view('posts.index', compact('posts'));
});

