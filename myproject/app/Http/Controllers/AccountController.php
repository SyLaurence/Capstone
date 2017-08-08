<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return view('pages/Account/account');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('pages/Account/account-add');
        return view('pages.Account.account-add');
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
        $UserItem = new User;
        
        $UserItem->user_name = request('txtUserName');
        $UserItem->first_name = request('txtFirstName');
        $UserItem->middle_name = request('txtMiddleName');
        $UserItem->last_name = request('txtLastName');
        $UserItem->email = request('txtEmail');
        $UserItem->password = md5(request('txtPassword'));
        $UserItem->contact_no = '0'.request('txtContact');
        $UserItem->image_path = 'images/'.request('photo');
        if(request('txtAccountType')=='Manager') {
            $level = 1;
        } else if(request('txtAccountType')=='Supervisor') {
            $level = 2;
        } else {
            $level = 3;
        }
        $UserItem->level = $level;

        $UserItem->save();

        return view('pages/Account/account');
        
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
