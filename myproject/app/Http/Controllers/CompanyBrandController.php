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
        /*$sam = 'heh';
        $uname = config('global.user_name');
        $uimage = config('global.user_image');

        $arrUser = array();
        $arrUser['uname'] = $uname;
        $arrUser['uimage'] = $uimage; */

        return view('pages/Company_Brand/bus',compact('CBItem'));
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
        $CBItem->strCBName = request('txtBusName');
        $CBItem->txtCBDescription = request('txtBusDesc');
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
        $item = \App\Company_Brand::where('intCBID', $id)->get();
        
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
        $item = \App\Company_Brand::where('intCBID', $id)->get();
        $item->first()->strCBName = $request->txtBusName;
        $item->first()->strCBDescription = $request->txtBusDesc;
        $item->save();

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
        $item = \App\Company_Brand::where('intCBID', $id)->get();

        $date = date('Y-m-d H:i:s');

        $item->first()->deleted_at = '2017-08-15 05:08:50';

        return redirect('/Company_Brand');

        //return $item->first()->deleted_at;
    }
}
