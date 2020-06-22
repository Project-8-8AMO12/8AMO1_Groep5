<?php

namespace App\Http\Controllers\Admin;

use App\Navigation_tables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavigatieController extends Controller
{

    public function index ()
    {
        $menus = Navigation_tables::all();
        return view('admin.navigation.index')->with('menus', $menus);
    }

    public function create ()
    {
            return view('admin.navigation.create');
    }

    public function store ()
    {
        request()->validate([
            'navigation_table_name' => ['required'],
            'navigation_table_slug' => ['required'],
        ]);

        $user = \Auth::user()->id;

        Navigation_tables::create([
            'user_id' => $user,
            'navigation_table_name' => request('navigation_table_name'),
            'navigation_table_slug' => request('navigation_table_slug')
        ]);

        return redirect('admin/navigation-menu')->with('success', 'de navigatie menu is toegevoegd.');
    }

    public function edit ($slug)
    {
        $navigation = Navigation_tables::select('*')
                                       ->leftJoin('navigation_tables_orders', 'navigation_tables_orders.navigation_table_id', '=', 'navigation_tables.navigation_table_id')
                                       ->leftJoin('pages','pages.page_id' , '=', 'navigation_tables_orders.page_id')
                                       ->where('navigation_table_slug', $slug)
                                       ->orderBy('navigation_tables_orders.order', 'ASC')
                                       ->get();

        return view('admin.navigation.edit', ['navigation' => $navigation]);
    }
}
