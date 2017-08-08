<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company_Brand;
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
        $CBItem = Company_Brand::all();
        return view('pages/Company_Brand/bus',compact('CBItem'));
        //return $CBItem;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.Company_Brand.bus-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
        $CBItem = new Company_Brand;
        $CBItem->name = request('txtBusName');
        $CBItem->description = request('txtBusDesc');
        $CBItem->save();

        return redirect('Company_Brand');
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
        $item = Company_Brand::find($id);
        return view('pages.Company_Brand.bus-edit',compact('item'));
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
        $CBItem = Company_Brand::find($id);

        $CBItem->name = $request->txtBusName;
        $CBItem->description = $request->txtBusDesc;
        $CBItem->save();

        return redirect ('Company_Brand');
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
        $CBItem = Company_Brand::find($id);

        $CBItem->delete();

        return redirect('/Company_Brand');
    }
}
