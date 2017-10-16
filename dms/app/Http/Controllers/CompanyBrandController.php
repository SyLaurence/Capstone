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
        return view('CompanyBrand.bus',compact('CBItem'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('CompanyBrand.bus-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $CBItem = new CompanyBrand;
        $CBItem->name = request('txtBusName');
        $CBItem->description = request('txtBusDesc');
        $CBItem->save();

        return redirect('CompanyBrand');
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
        
        return view('CompanyBrand.bus-edit',compact('item'));
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
        $item = CompanyBrand::find($id);
        $item->name = $request->txtBusName;
        $item->description = $request->txtBusDesc;
        $item->save();

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
        $item = CompanyBrand::find($id);
        $item->delete();
        return redirect('CompanyBrand');
    }
}
