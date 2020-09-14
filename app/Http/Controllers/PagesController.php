<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function execute () {
        if (view()->exists('admin.pages')) {
            $pages = Page::all();
            $title = 'Страницы';
            return view('admin.pages', compact(['title', 'pages']));
        }
        else {
            abort(404);
        }
    }
}
