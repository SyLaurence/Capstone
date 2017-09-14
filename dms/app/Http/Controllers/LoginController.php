<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->get('user_id')>0)
        {
            if(session()->get('level') == 0){
                return view('Dashboard');
            } else if(session()->get('level') == 1){
                return view('DashboardStaff');
            }
        } else {
            return view('login');
        }
        
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
    public function store(Request $request)
    {
       $username = $request->hdUname;
       $password = $request->hdPword;
       $UserItem = User::where('username', $username)->get();
       if($UserItem != '[]'){
            $passFromDB = $UserItem->first()->password;
            $pass = md5($password);

            if ($pass == $passFromDB) {
                // The passwords match...
                $name = $UserItem->first()->first_name . " " .$UserItem->first()->last_name . " " . $UserItem->first()->middle_name;
                session([
                        'username' => $username,
                        'image' => $UserItem->first()->image_path,
                        'name' => $name,
                        'email' => $UserItem->first()->email,
                        'contact' => $UserItem->first()->contact_no,
                        'user_id' => $UserItem->first()->id,
                        'level' => $UserItem->first()->level,
                        'pass_txt' => $password
                    ]);
                if(session()->get('level') == 0){
                    return view('Dashboard');
                } else if(session()->get('level') == 1){
                    return view('DashboardStaff');
                }
                
            } else {
                return view('/Login');
            }
       } else{
            return view('login');
       }

        
    }
    public function logout()
    {
        session()->flush();
        return redirect('/Login');
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
