<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadedPicture extends Model
{
    protected $table = 'uploaded_pictures';

    protected $fillable = [
        'title',
        'description',
        'image',
        'category_id',
        'user_id',

    ];


    public function user(){

        return $this -> belongsTo('App\User');
    }

    public function category(){

        return $this -> belongsTo('App\Category');
    }

    public function comments(){

        return $this->hasMany('App\Comment');
    }
}
