<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageAddRequest;
use App\Page;
use Illuminate\Http\Request;

class PagesAddController extends Controller
{
    public function execute () {
        if (view()->exists('admin.pages_add')) {
            $title = 'Новая страница';
            return view('admin.pages_add', compact('title'));
        }
        else {
            abort(404);
        }
    }
    public function input (PageAddRequest $request) {
        if ($request->isMethod('post')) {
            $input =$request->except('_token');
            $input['title'] = 'none';

            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path(). '/assets/img', $input['images']);
            }

            $page = new Page();
            $page->fill($input);

            if ($page->save()) {
                return redirect('admin')->with('status', 'Страница добавлена');
            }

        }
    }
}
