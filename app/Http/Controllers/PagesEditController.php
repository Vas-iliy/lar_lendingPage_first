<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageAddRequest;
use App\Page;
use Illuminate\Http\Request;
use Validator;

class PagesEditController extends Controller
{
    public function execute(Page $page) {
        $title = 'Редактирование - ' . $page->name;
        if (view()->exists('admin.pages_edit')) {
            return view('admin.pages_edit', compact(['title', 'page']));
        }
    }

    public function input(Page $page, PageAddRequest $request) {
        if ($request->isMethod('post')) {
            $input = $request->except('_token');
            $input['title'] = 'none';

            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path(). '/assets/img', $input['images']);
            }
            else {
                $input['images'] = $input['old_images'];
            }
            unset($input['old_images']);

            $page->fill($input);

            if ($page->update()) {
                return redirect('admin')->with('status', 'Страница обновлена');
            }
        }
    }
}
