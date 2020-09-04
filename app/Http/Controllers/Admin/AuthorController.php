<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ColumnAuthor;
use App\Http\Requests\AuthorStorageRequest;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = ColumnAuthor::oldest()->paginate();
        return view('admin.author.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorStorageRequest $request)
    {
        $datas = $request->all();
        if(!empty($request->file('avatar'))) {
            $datas['avatar'] = $request->file('avatar')->store('upload');
        }
        ColumnAuthor::create($datas);
        return redirect()->route('admin.authors.index');
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
    public function edit(ColumnAuthor $author)
    {
        return view('admin.author.create', ['data' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ColumnAuthor $author)
    {
        $datas = $request->all();
        if(!empty($request->file('avatar'))) {
            $datas['avatar'] = $request->file('avatar')->store('upload');
        }
        $author->update($datas);
        return redirect()->route('admin.authors.index');
    }

    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ColumnAuthor $author)
    {
        $author->delete();
        return response()->json(['status' => 0]);
    }
}
