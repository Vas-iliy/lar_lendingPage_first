<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Servic;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (view()->exists('admin.services.services')) {
            $title = 'Сервисы';
            $services = Servic::all();
            return view('admin.services.services', compact(['title', 'services']));
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
        if (view()->exists('admin.services.services_add')) {
            $title = 'Новый сервис';
            return view('admin.services.services_add', compact('title'));
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
    public function store(ServiceRequest $request)
    {
        if ($request->isMethod('post')){
            $input = $request->except('_token');
            $services = new Servic();
            $services->fill($input);
            if ($services->save()) {
                return redirect('admin')->with('status', 'Сервис добавлен');
            }
        }
        else {
            abort(404);
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
