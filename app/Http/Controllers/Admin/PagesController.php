<?php

namespace App\Http\Controllers\Admin;

use App\Pages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function index(){
        return view("admin.pages.index")->with("pages", Pages::paginate(10));
    }

    public function create(){
        return view("admin.pages.create");
    }

    public function store(){
        request()->validate([
            'page_name' => ['required'],
            'page_slug' => ['required'],
            'template' => ['required'],
        ]);
        $user = \Auth::user();
        Pages::create([
            'user_id' => $user->id,
            'page_name' => request('page_name'),
            'page_slug' => request('page_slug'),
            'template' => request('template'),
            'body' => request('body'),
        ]);
        return redirect()->back()->with('success', 'De pagina is toegevoegd!');
    }
}
