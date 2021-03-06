<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id','avator','about','youtube','facebook','linkedin'];
    public function user(){
        return $this->belongsTo('App\user');
    }
}
