<?php

namespace App\Models;

class Post 
{
    static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "penulis" => "Himura kenshin",
            "body" => "ini body artikel 1. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem, magni?" 
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "penulis" => "Tokugawa Ieyasu",
            "body" => "ini body artikel 2. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem, magni?"
        ]];

    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        $posts = static::all();
        
        return $posts->firstWhere('slug',$slug);
    }
    

}
