<?php

namespace App\Http\Controllers;

use App\Page;
use App\People;
use App\Portfolio;
use App\Servic;
use DB;
use Illuminate\Http\Request;

use Faker\Generator as Faker;

class IndexController extends Controller
{
    public function execute(Request $request) {
        $pages = Page::all();
        $portfolios = Portfolio::get(['name', 'filter', 'images']);
        $services = Servic::where('id', '<', 20)->get();
        $peoples = People::take(3)->get();

        $tags = DB::table('portfolios')->distinct()->pluck('filter');

        foreach ($pages as $page) {
            $menu[] = ['title' => $page->name, 'alias' => $page->alias];
        }

        $menu[] = ['title' => 'Services', 'alias' => 'service'];
        $menu[] = ['title' => 'Portfolio', 'alias' => 'Portfolio'];
        $menu[] = ['title' => 'Team', 'alias' => 'team'];
        $menu[] = ['title' => 'Contact', 'alias' => 'contact'];

        return view('site.index', [
            'menu' => $menu,
            'pages' => $pages,
            'services' => $services,
            'portfolios' => $portfolios,
            'peoples' => $peoples,
            'tags' => $tags
        ]);
    }
}
