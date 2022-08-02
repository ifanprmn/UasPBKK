<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    //yang hanya boleh diisi
    protected $guarded = ['id'];
    protected $with = ['category','author'];

    public function scopeFilter($query, array $filters){

        // if(isset($filters['search']) ? $filters['search']: false){
        //     return $query -> where('title', 'like', '%'. request('search'). '%')
        //                   -> orWhere('body', 'like', '%'. request('search'). '%');
        // }


        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                   $query->where('title', 'like', '%' . $search . '%')
                         ->orWhere('body', 'like', '%' . $search . '%');
             });
         });
         end($query);
       
        $query->when($filters['category'] ?? false, function($query, $category){
            return $query ->whereHas('category', function($query) use($category){
                    $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, function($query, $author){
            return $query ->whereHas('author', function($query) use($author){
                    $query->where('username', $author);
            });
        });

    }

    //yang tidak boleh diisi sisanya blh 
    //protected $guarded =['id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function getRouteKeyName(){
        return 'slug';
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
