<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesAddController extends Controller
{
    public function execute (Request $request) {
        if (view()->exists('admin.pages_add')) {
            $title = 'Новая страница';
            return view('admin.pages_add', compact('title'));
        }
        else {
            abort(404);
        }
    }
}
