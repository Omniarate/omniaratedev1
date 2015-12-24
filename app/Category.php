<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';

    function uploadedPicture(){

        return $this->hasMany('App\UploadedPicture');
    }
}
