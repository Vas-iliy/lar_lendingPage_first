<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PagesEditController extends Controller
{
    public function execute(Page $page, Request $request) {
        $title = 'Редактирование - ' . $page->name;
        if (view()->exists('admin.pages_edit')) {
            return view('admin.pages_edit', compact(['title', 'page']));
        }

    }
}
