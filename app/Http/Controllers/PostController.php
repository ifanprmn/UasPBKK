<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;



class PostController extends Controller
{
    public function index(){

        $title ='';
        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = 'Oleh ' . $author->name;
        }elseif(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = 'Berkategorikan ' . $category->name;
        }

        return view('blog',[
            "title" => "Semua Artikel ". $title,
            "active"=> 'blog',
            //"blog" => Post::all()
            "blog" => Post::latest()->filter(request(['search','category','author']))->paginate(4)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('post',[
            "title" => "Single Post",
            "post" => $post,
            "active"=> 'blog'
        ]);
    }
}
