<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (view()->exists('admin.portfolio.portfolio')) {
            $title = 'Портфолио';
            $portfolio = Portfolio::all();
            return view('admin.portfolio.portfolio', compact(['title', 'portfolio']));
        }
        else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if (view()->exists('admin.portfolio.portfolio_add')) {
            $title = 'Новое изображение';
            return view('admin.portfolio.portfolio_add', compact('title'));
        }
        else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->except('_token');
            $input['filter'] = trim($input['filter']);
            $file = $request->file('images');
            $input['images'] = $file->getClientOriginalName();
            $file->move(public_path() . '/assets/img', $input['images']);


            $portfolio = new Portfolio();
            $portfolio->fill($input);

            if ($portfolio->save()) {
                return redirect('admin')->with('status', 'Изображение добавлено');
            }
            else {
                abort(404);
            }
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
