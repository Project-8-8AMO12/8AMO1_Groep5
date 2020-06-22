<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigation_tables_orders extends Model
{
    protected $fillable = [
        'user_id', 'navigation_table_id', 'page_id', 'order'
    ];
}
