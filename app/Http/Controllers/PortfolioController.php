<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
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
     * @param PortfolioRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PortfolioRequest $request)
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
     * @param Portfolio $portfolio
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Portfolio $portfolio)
    {
        dd($portfolio);
        $title = 'Редактирование - ' . $portfolio->name;
        if (view()->exists('admin.portfolio.portfolio_edit')) {
            return view('admin.portfolio.portfolio_edit', compact(['title', 'portfolio']));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PortfolioRequest $request
     * @param Portfolio $portfolio
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        if ($request->isMethod('patch')) {
            $input = $request->except('_token');
            $input['filter'] = trim($input['filter']);

            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path() . '/assets/img', $input['images']);
            }
            else {
                $input['images'] = $input['old_images'];
            }
            unset($input['old_images']);

            $portfolio->fill($input);

            if ($portfolio->update()) {
                return redirect('admin')->with('status', 'Изображение обновлено');
            }
        }
        else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Portfolio $portfolio
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Request $request, Portfolio $portfolio)
    {
        if ($request->isMethod('delete')) {
            $portfolio->delete();
            return redirect('admin')->with('status', 'Изображение удалено');
        }
    }
}
