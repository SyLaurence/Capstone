<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('Account.account', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Account.account-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $UserItem = new User;
        
        $UserItem->username = request('txtUserName');
        $UserItem->first_name = request('txtFirstName');
        $UserItem->middle_name = request('txtMiddleName');
        $UserItem->last_name = request('txtLastName');
        $UserItem->email = request('txtEmail');
        $UserItem->password = md5(request('txtPassword'));
        $UserItem->contact_no = '0'.request('txtContact');
        $UserItem->image_path = 'images/'.request('photo');
        if(request('txtAccountType')=='Admin') {
            $level = 0;
        } else if(request('txtAccountType')=='HR Staff') {
            $level = 1;
        }
        $UserItem->level = $level;

        $UserItem->save();

        return redirect('/User');
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
        $user_id = substr($id, 0,(strlen($id)-4));
        if(strpos($id, 'pass')) {
            $user = User::find($id);
            return view('Account.account-password-edit',compact('user'));
        } else if(strpos($id, 'role')) {
            $user = User::find($id);
            return view('Account.account-role-edit',compact('user'));
        } else if(strpos($id, 'prof')) {
            $user = User::find($id);
            return view('Account.account-profile-edit',compact('user'));
        }
        //$user = User::find($id);
        //return View('Account.account-edit');
        
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
        if($request->hdRType == "role"){
            $item = User::find($id);
            if($request->txtAccountType == "Admin"){
                $role = 0;
            } else if($request->txtAccountType == "HR Staff"){
                $role = 1;
            }
            $item->level = $role;
            $item->save();
            return redirect('/User');
        } else if($request->hdRType == "pass"){
            $item = User::find($id);
            $item->password = md5($request->pass);
            $item->save();
            return redirect('/User');
        } else if($request->hdRType == "prof"){
            $item = User::find($id);
            $item->username = $request->txtUserName;
            $item->first_name = $request->txtFirstName;
            $item->middle_name = $request->txtMiddleName;
            $item->last_name = $request->txtLastName;
            $item->email = $request->txtEmail;
            $item->contact_no = '0'.$request->txtContact;
            $item->image_path = 'images/'.$request->photo;
            $item->save();
            return redirect('/User');
        }
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
