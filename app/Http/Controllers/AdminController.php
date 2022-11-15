<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;
use Validator;
use Session;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.index');
    }
    public function addsubadmin()
    {
        return view('backend.add_sub_admin_add');
    }
    public function Userinctive($id)
    {
        DB::table('users')->where('id', $id)->update([
            'status' => 1
        ]);
        return redirect()->back();
    }
    public function Useractive($id)
    {
        DB::table('users')->where('id', $id)->update([
            'status' => 0
        ]);
        return redirect()->back();
    }
    
    public function subAdminView()
    {
        $data = DB::table('user_role')->where('role_id', 2)->get();
        $user_list = [];
        foreach ($data as $key => $value) {
            $user_list[] = $value->user_id;
        }
        $subadminlist = DB::table('users')->whereIn('id',$user_list)->get();
        return view('backend.add_sub_admin_view', compact('subadminlist'));
    }
    public function submiteBlog(Request $request)
    {
        //dd($request->all());

        $validation = Validator::make($request->all(),[

            'blog_tittle' => 'required',
            'blog_description' => 'required',
            'email' => 'required|email|unique:blogs',
            'phone' => 'required|regex:/^[0-9\s]{11}+$/',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:1000',

        ]);

        if ($validation->fails()) {
            return redirect('/admin/dashboard/add-post')->withErrors($validation)->withInput();
        }



        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads');



        $blog = new blog;
        $blog->blog_tittle = $request->blog_tittle;
        $blog->blog_description = $request->blog_description;
        $blog->email = $request->email;
        $blog->phone = $request->phone;
        $blog->image = $name;
        $blog->active = $request->active;
        $blog->ref_date = $request->ref_date;
        
        $blog->save();

        $image->move($destinationPath, $name);
        Session::flash('insert', 'Inserted Successfully');
        return redirect()->back();
    }
    public function ViewBlog()
    {
        $blog = blog::all();
        return view('backend.Blogview',compact('blog'));
    }
}
