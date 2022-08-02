<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

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
    return view('home', [
        "title"=>"Home",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about',[
        "nama" => "Ifan Permana",
        "ket" => "Videographer",
        "image" => "img/account.jpg",
        "title" => "About",
        "active"=> 'about'
    ]);
});

Route::get('/blog', [PostController::class,'index']);
Route::get('blog/{post:slug}', [PostController::class,'show']);

Route::get('/category', function (){
    return view('categories',[
        'title'=> 'Post Categories',
        'categories'=> Category::all(),
        "active"=> 'categories'
        ]);
});

Route::get('/category/{category:slug}',function(Category $category){
    return view('blog',[
    'title'=> "Post by category : $category->name",
    'blog'=> $category->blog->load('author','category'),
    "active"=> 'blog'

    ]);
});

Route::get('/author/{author:username}', function(User $author){
   return view('blog',[
       'title' => "Pembuat Artikel : $author->name",
       'blog' => $author->post->load('author','category'),
       'active' => 'blog'
   ]);
});


//Route autentikasi

Route::get('/register', [RegisterController::class,'indexRegister'])->middleware('guest');
Route::post('/register', [RegisterController::class,'Register']);

Route::get('/login', [LoginController::class,'indexLogin'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class,'authenticate']);

Route::get('/dashboard', function(){
    return view('dashboard.index',[
        "title" => "Dashboard",
        'active' =>''
    ]);
})->middleware('auth');

Route::post('/logout', [LoginController::class,'logout']);

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class);





