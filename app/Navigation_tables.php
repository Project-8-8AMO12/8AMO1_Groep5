<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigation_tables extends Model
{
    protected $fillable = [
        'user_id', 'navigation_table_name', 'navigation_table_slug'
    ];
}
