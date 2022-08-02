<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable=['name','slug'];
    // protected $with=['category','author'];

    public function blog(){
        return $this->hasMany(Post::class);
    }
}
