<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyBrand;
use App\Http\Requests;

class CompanyBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CBItem = CompanyBrand::all();
        return view('pages/CompanyBrand/bus',compact('CBItem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.CompanyBrand.bus-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
        $CBItem = new CompanyBrand;
        $CBItem->name = request('txtBusName');
        $CBItem->description = request('txtBusDesc');
        $CBItem->save();

        return redirect ('CompanyBrand');
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
        $item = CompanyBrand::find($id);
        return view('pages.CompanyBrand.bus-edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $CBItem = CompanyBrand::find($id);

        $CBItem->name = $request->txtBusName;
        $CBItem->description = $request->txtBusDesc;
        $CBItem->save();

        return redirect ('CompanyBrand');
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
        $CBItem = CompanyBrand::find($id);

        $CBItem->delete();

        return redirect('/CompanyBrand');
    }
}
