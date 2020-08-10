<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Address as AddressResource;
use App\Models\Address;
use App\Http\Requests\AddressStorageRequest;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Auth::user()->addresses()->orderBy('is_default', 'desc')->get();
        return AddressResource::collection($datas);
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
    public function store(AddressStorageRequest $request)
    {
        $datas = $request->input();
        Auth::user()->addresses()->create($datas);
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
        return Auth::user()->addresses()->findOrFail($id);    
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressStorageRequest $request, $id)
    {
        $address = Auth::user()->addresses()->findOrFail($id);
        $address->update($request->input());
        return response()->json(['message' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Auth::user()->addresses()->findOrFail($id);
        $address->delete();
        return response()->json(['message' => 'success']);
    }
}
