<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Post extends Model
{
    use softDeletes;


    protected $fillable =   [
        'title','featured','category_id','content','slug','user_id'
    ];

    public function getFeaturedAttribute($featured){
        return asset($featured);
    }

    protected $date =   ['deleted_at'];


    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function user(){
        return $this->belongsTo('App\user');
    }
}
