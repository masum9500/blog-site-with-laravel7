<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Session;
class loginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function registration(Request $request)
    {
        if (isset($request->role_id) && $request->role_id == 2) {
            $Alldata = DB::table('users')->insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
            ]);

            $db = DB::table('user_role')->insert([
            'role_id' => $request->role_id,
            'user_id' => $Alldata
            ]);
            Session::flash('register', 'User Registration Seccessfully!!');
            return redirect()->back();

        }
        $validation = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        

        if ($validation->fails()) {
            return redirect('/login-form')->withErrors($validation)->withInput();
        }
        
        
    }
    public function loginsubmit(Request $request)
    {
        $data = DB::table('users')->where('email', $request->email)->where('password', $request->password)->first();
        if($data != null) {
            $role = DB::table('user_role')->where('user_id', $data->id)->first();
            if ($role != null) {
                $user_role = $role->role_id;
                $user_id = $data->id;
                $name = $data->name;
                $email = $data->email;
                Session::put('user_info', [$user_role, $user_id, $name, $email]);
                //dd(Session::get('user_info'));
                if ($role->role_id == 3) {
                    return redirect('/');
                }elseif ($role->role_id == 2) {
                    return redirect('/subadmin');
                }else{
                    return redirect('/admin/dashboard');
                }
                
            }
        }else{
                Session::flash('register', 'User Email Or password Wrong!!');
                return redirect()->back();

            }
    }
    public function logout()
    {
        Session::forget('user_info');
        Session::flush();
        return redirect('/login-form');
    }
}
