<?php

namespace App\Http\Controllers;

use App\Page;
use App\People;
use App\Portfolio;
use App\Servic;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function execute(Request $request) {
        $pages = Page::all();
        $portfolios = Portfolio::get(['name', 'filter', 'images']);
        $services = Servic::where('id', '<', 20)->get();
        $peoples = People::take(3)->get();



        return view('site.index');
    }
}
