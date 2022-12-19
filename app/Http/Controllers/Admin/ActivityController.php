<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityRequest;
use App\Models\Activity;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ActivityController extends Controller
{

    public function index()
    {
        return view('admin.asosiasi.activity.index');
    }

    public function create()
    {
        return view('admin.asosiasi.activity.create');
    }

    public function store(ActivityRequest $request)
    {
        try {
            Activity::create($request->all());
            Alert::success('Success', 'Data kegiatan berhasil ditambahkan.');
            return redirect()->route('activity.index');
        } catch (Exception $error) {
            Alert::toast($error->getMessage(), 'error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.asosiasi.activity.detail', [
            'data' => Activity::findOrFail($id)
        ]);
    }

    public function edit($id)
    {
        return view('admin.asosiasi.activity.edit', [
            'data' => Activity::findOrFail($id)
        ]);
    }

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