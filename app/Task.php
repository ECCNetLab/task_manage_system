<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'body',
        'file',
    ];
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}