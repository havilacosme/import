<?php

namespace Modules\Import\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Import\Exports\ModelExport;
use Modules\Import\Exports\ModelImport;
use Modules\Import\Http\Requests\FileRequest;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return Excel::download(new ModelExport, 'users.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('import::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(FileRequest $request)
    {
        $table = pathinfo(request()->file('file')->getClientOriginalName(), PATHINFO_FILENAME);
        request()->session()->forget('table');
        request()->session()->put('table', $table);
        request()->session()->save();
        if(Excel::import(new ModelImport, request()->file('file')))
        {
            alert()->success('Ok','Importação realizada com sucesso!');
        } else {
            alert()->error('Erro','Não foi possivel realizar a importação!');
        }
        return redirect('/import/create')->with('success', 'All good!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('import::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('import::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function import()
    {
        Excel::import(new ModelImport, 'users.xlsx');

        return redirect('/')->with('success', 'All good!');
    }
}
