<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\AdvertisementPosition;
use Illuminate\Support\Facades\View;
use App\Http\Requests\AdvRequest;
class AdvertisementController extends Controller
{
    public function __construct()
    {
        $postions = AdvertisementPosition::pluck('name', 'id');
        View::share('positions', $postions);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Advertisement::latest()->get();
        return view('admin.advertisement.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvRequest $request)
    {
        $datas = $request->all();
        if($request->file('content')) {
            $datas['content'] = $request->file('content')->store('advertisement');
        }
        Advertisement::create($datas);
        return redirect()->route('admin.advertisement.index');
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
    public function edit(Advertisement $advertisement)
    {
        return view('admin.advertisement.create', ['data' => $advertisement]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvRequest $request, Advertisement $advertisement)
    {
        $datas = $request->all();
        if($request->file('content')) {
            $datas['content'] = $request->file('content')->store('advertisement');
        }
        $advertisement->update($datas);
        return redirect()->route('admin.advertisement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();
        return response()->json(['status' => 0]);
    }
}
