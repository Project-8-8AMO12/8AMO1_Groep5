<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = [
        'user_id', 'page_name', 'page_slug', 'template', 'body'
    ];
}
