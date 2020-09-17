<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Servic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

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
     * @return RedirectResponse|Redirector
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
     * @param Servic $services
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $services = Servic::find($id);

        if (view()->exists('admin.services.services_edit')) {
            $title = 'Редактирование сервиса';
            return  view('admin.services.services_edit', compact(['title', 'services']));
        }
        else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ServiceRequest $request
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function update(ServiceRequest $request, $id)
    {
        if ($request->isMethod('patch')) {
            $input = $request->except('_token');

            $servic = Servic::find($id);
            $servic->fill($input);
            if ($servic->update()) {
                return redirect('admin')->with('status', 'Сервис успешно отредактирован');
            }
            else {
                abort(404);
            }
        }
        else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function destroy($id, Request $request)
    {
        if ($request->isMethod('delete')) {
            $service = Servic::find($id);
            $service->delete();
            return redirect('admin')->with('status', 'Изображение удалено');
        }
    }
}
