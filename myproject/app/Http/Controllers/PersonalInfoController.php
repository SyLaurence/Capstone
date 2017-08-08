<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Config\Repository;
use App\Personal_info;

class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/Applicant/applicant');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages/Applicant/applicant-add-wizard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        /*$CBItem = new App\Company_Brand;
        $CBItem->name = $request->name;
        $CBItem->description = $request->description;
        $CBItem->save();*/
        //
        /*$PItem = Personal_info::create($request->all());
        $PItem->save();
        return Response::json($request);*/

        $image_path = 'images/' . str_replace(trim('C:\fakepath\ '), '', request('image_path'));        

        //return redirect('Company_Brand/store');

        /*$obj = str_replace('[', '', request('hdWxp'));
        $Wxp = str_replace(']', '', $obj);
        //$Wxp = json_decode($Wxp);
        $Wxp = str_replace('}', '}end', $Wxp);
        $Wxp = str_replace(',{', '', $Wxp);
        $arr = explode('end', $Wxp);*/
        
        $arr = json_decode(request('hdWxp'),true);
        $str = $arr[1];
        return $arr[1]['strName'];
        
        //return $image_path;

        /*config(['global.user_id' => 'heh']);

        return config('global.user_id');*/
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
    public function destroy($id)
    {
        //
    }
}
