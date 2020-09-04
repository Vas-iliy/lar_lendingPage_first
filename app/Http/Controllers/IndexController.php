<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Mail\OrderShipped;
use App\Page;
use App\People;
use App\Portfolio;
use App\Servic;
use DB;
use Mail;

class IndexController extends Controller
{
    public function execute() {
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

        return view('site.index', compact(['menu', 'pages', 'services', 'portfolios', 'peoples', 'tags']));
    }

    public function input (IndexRequest $request ) {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $email = 'Vkolyasev1999@mail.ru';
            Mail::to($email)->send(new OrderShipped($data));

            return redirect()->route('home')->with('status', 'Email is send');

        }
    }
}
