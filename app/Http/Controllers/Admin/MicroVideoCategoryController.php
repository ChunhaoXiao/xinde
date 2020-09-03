<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MicroVideoCategory;
use App\Http\Requests\MicrovideoCategoryRequest;
class MicroVideoCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = MicroVideoCategory::oldest()->get();
        return view('admin.microvideocategory.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.microvideocategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MicrovideoCategoryRequest $request)
    {
        $datas = $request->all();
        if($request->file('icon')) {
            $datas['icon'] = $request->file('icon')->store('uploads');
        }
        MicroVideoCategory::create($datas);
        return redirect()->route('admin.microvideocategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MicroVideoCategory $microvideocategory)
    {
        return view('admin.microvideocategory.create', ['data' => $microvideocategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MicrovideoCategoryRequest $request, MicroVideoCategory $microvideocategory)
    {
        $datas = $request->all();
        if($request->file('icon')) {
            $datas['icon'] = $request->file('icon')->store('uploads');
        }
        $microvideocategory->update($datas);
        return redirect()->route('admin.microvideocategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MicroVideoCategory $microvideocategory)
    {
        $microvideocategory->delete();
        return response()->json(['status' => 0]);
    }
}
