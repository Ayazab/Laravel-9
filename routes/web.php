<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;

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


/*

//ROUTE

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function(){
    return "<h1>Hello World!</h1>";
});

Route::get('/greet', function(){
    return "Hello World!";
});

//PARAMATERIZED ROUTE

Route::get('/greeting/{id}', function($id){
    return "<h1>User ID is: $id</h1>";
});


//OPTIONAL PARAMETERS

Route::get('/user/{name?}', function($name=null){
    return "<h1>NAME: $name</h1>";
});

//ROUTE CONSTRAINTS

Route::get('/const/{name}', function($name){
    return "<h1>NAME: $name</h1>";
})->where('name', '[A-Za-z]+');


//SIMPLE REDIRECT and  ALSO USING HREF

Route::redirect('/', 'login');


Route::get('login', function () {
    return "LOGIN PAGE <a href='/about'>About</a>";
});

Route::get('/about', function () {
    return "ABOUT PAGE";
});

*/


//12. BLADE

// Route::get('/greeting', function(){
//     return view('greeting');
// });

// Route::view('/greeting', 'greeting');

//13. Passing dynamic data

// Route::get('/greeting', function(){
//     $name="Ayyaj";
//     //return view('greeting',['name'=>$name]);
//     //return view('greeting', compact('name'));
//     //return view('greeting')->with('name', $name);
// });


//14. Nested Blade

// Route::get('/test', function(){
//     //return view('admin.profile');
//     return view('admin/profile');
// });

//16.17. Master Layout

// Route::view('/test', 'test');
// Route::view('/test1', 'test1');






// //22. open blade from controller

// Route::get('users', [UserController::class, 'index']);

// //23.
// Route::get('users/{name}', [UserController::class, 'showname']);

// //24. Resource controller
// Route::resource('posts', PostController::class);

// //26. verifying Database connection
// Route::get('/connection', function(){
//     try{
//         DB::connection()->getPdo();
//         return "Connected succesfully";
//     }
//     catch(\Exception $ex){
//         dd($ex->getMessage());
//     }
// });



//38. 40.
//Route::get('test', function(){

    // Post::create([
    //     'title'=>'Larave 10',
    //     'description'=>'Laravel 10 is very good',
    //     'is_published'=>false,
    //     'is_active'=>false
    // ]);

    // return 'inserted successfully';


    //40.

    // $posts = Post::all();
    // return $posts;

    //$posts = Post::find(2); //id match krega
    // $posts = Post::findOrfail(5);
    // return $posts;

    // $posts =Post::where('title', 'Larave 10')->get();
    // return $posts;


    //41.

    // $posts = Post::find(2);
    // //$posts = Post::where('description', 'laravel 9 is very good');
    // if(!$posts){
    //     return "Not Found";
    // }
    // $posts->update([
    //     'title'=>'Laravel 9.0'
    // ]);
    // return "Updated successfully";


    //42.

    // $posts = Post::find(4);
    // if(!$posts){
    //     echo "Not Found";
    // }else{
    //     $posts->delete();
    //     return "Deleted successfully";
    // }

//});

//43. and 44.

// Route::get('posts',[PostController::class, 'index']);
// Route::get('posts/store',[PostController::class, 'store']);
// Route::get('posts/update',[PostController::class, 'update']);
// Route::get('posts/destroy',[PostController::class, 'destroy']);


//45.

Route::resource('posts', PostController::class);
Route::get('posts/soft-delete/{id}', [PostController::class, 'softDelete'])->name('posts.soft-delete');
Route::get('get/posts', [PostController::class, 'getPosts'])->name('get.posts');


// //47.

Route::get('/test1', function(){
    return "TEST 1";
})->name('test.1');

Route::get('/test2', function(){
    return "TEST 2";
});



//56.

// Route::get('test', function(){
//     Session::put('login', 'You are logged in');
//     //Session::forget('login');
//     //Session::flush();

//     if(Session::has('login')){
//         return 'session set';
//     }else{
//         return 'Session not set';
//     }


// });

// Route::get('test', function(Request $request){
//     $request->session()->put('login', $value);
//     $request->session()->forget('logib');
//     $request->session()->flush();

//     if($request->session()->has('login')){
//         return 'session set';
//     }else{
//         return 'Session not set';
//     }

// });



//78.
Route::get('test', function () {
    // $user=User::first();
    // return $user->post;

    //79.
    // $post=Post::first();
    // return $post->user;

    //80.
    // $user=User::first();
    // return $user->posts;

    //81.
    // $post=Post::first();
    // return $post->user;

    //82.
    // $user=User::first();
    // if($user->post){
    //     return $user->post->title;
    //}

    // //83.
        // $user=User::first();
        // return $user->postComment;

    //84.
    // $user=User::first();
    // return $user->postComments;

    //86.
    $user=User::first();
    $role=Role::first();
    // return $user->roles()->attach($role);
    // return $user->roles()->detach($role->id);
    // return $user->roles;


    // $user->roles()->attach([1,2]);
    // $user->roles()->detach([1,2]);

    $user->roles->sync([1]); //1 ko rehne dega 2 vali id delete
    return 'attached';
});
