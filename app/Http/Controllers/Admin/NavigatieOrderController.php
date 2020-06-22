<?php

namespace App\Http\Controllers\Admin;

use App\Navigation_tables;
use App\Navigation_tables_orders;
use App\Pages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavigatieOrderController extends Controller
{

    public function create ()
    {
        $navigation = Navigation_tables::all();
        $pages = Pages::all();

        return view('admin.navigation.createOrder', ['navigation' => $navigation], ['pages' => $pages]);
    }

    public function store ()
    {
        $user = \Auth::user()->id;

        Navigation_tables_orders::create([
            'user_id' => $user,
            'navigation_table_id' => request('navigation_table_id'),
            'page_id' => request('page_id'),
            'order' => 999
        ]);

        return redirect()->back();
    }
}
