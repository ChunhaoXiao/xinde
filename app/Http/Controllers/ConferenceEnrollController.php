<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConferenceEnroll;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ConferenceEnrollRequest;

class ConferenceEnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConferenceEnrollRequest $request)
    {
        $datas = $request->input();
        Auth::user()->enrolls()->create($datas); 
        return response()->json(['message' => 'success']);       
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
    public function destroy(ConferenceEnroll $enroll)
    {
        if($enroll->user_id == Auth::id()) {
            $enroll->delete();
            return response()->json(['message' => 'success']);
        }
        return response()->json(['message' => '数据不存在'], 404);
    }
}
