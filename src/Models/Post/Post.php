<?php

namespace Stephendevs\Pagman\Models\Post;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


    protected $fillable = [
        'post_key', 'post_type', 'post_title', 'post_content', 'post_featured_image', 'extract_text'
    ];
    
    protected $with = ['author:id,username'];
    
    public function scopeFindPost($query, $column, $value)
    {
        return $query
        ->where($column, $value);
    }

    //Retrieve posts of a specific type
    public function scopePosts($query, $type = null, $paginated = false, $count = 4)
    {
        if($paginated){
            if($type != null){
                return $query
                ->where('post_type', $type)
                ->paginate($count);
            }else{
                return $query
                ->paginate($count);
            }
        }else{
            if($type != null){
                return $query
                ->where('post_type', $type)
                ->get();
            }else{
                return $query
                ->get();
            }
        }
        
    }


    //The latest news
    public function scopeLatestNews($query, $paginate = false, $count = 4)
    {
        if($paginate){
            return $query
            ->where('post_type', 'news')
            ->with(['author:id,username'])
            ->paginate($count);
        }
        return $query
        ->where('post_type', 'news')
        ->with(['author:id,username'])
        ->get();
    }

    public function scopeFindNews($query, $id)
    {
        return $query
        ->where('id', $id);
    }

    public function scopeFindPage($query, $column, $value)
    {
        return $query
        ->where($column, $value)
        ->where('post_type', 'page');
    }

    public function scopePages($query)
    {
        return $query
        ->where('post_type', 'page');
    }


   public function author()
   {
       return $this->belongsTo(config('pagman.user_model', 'Stephendevs\Lad\Models\Admin\Admin'));
   }

   public function media()
   {
        return $this->hasMany('Stephendevs\Pagman\Models\Post\PostMedia');
   }
}
