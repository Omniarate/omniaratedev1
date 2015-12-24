<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';


    protected $fillable = [
        'content',
        'user_id',
        'uploaded_picture_id',
    ];


    public function setCreatedAtAttribute()
    {
        return Carbon::now();
    }


    public function uploaded_picture()
    {

        return $this->belongsTo('App\UploadedPicture');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
