<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStorageRequest;
class ColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Category::with('subcates', 'parent', 'type')->get();

        return view('admin.column.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.column.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStorageRequest $request)
    {
        $datas = $request->all();
        if($request->icon) {
            $datas['icon'] = $request->icon->store('uploads');
        }
        Category::create($datas);
        return redirect()->route('admin.columns.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $column)
    {
        return $column->type;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $column)
    {
        return view('admin.column.create', ['data' => $column]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryStorageRequest $request, Category $column)
    {
        $datas = $request->input();
        if($request->icon) {
            $datas['icon'] = $request->icon->store('uploads');
        }
        $column->update($datas);
        return redirect()->route('admin.columns.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $column)
    {
        if($column->canNotDelete()) {
            return response()->json(['status' => 1, 'message' => '该栏目下有文章或子分类，不能删除此栏目'], 400);
        }
        $column->delete();
        return response()->json(['status' => 0]);
    }
}
