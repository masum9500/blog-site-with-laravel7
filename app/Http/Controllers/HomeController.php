<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;
use DB;
class HomeController extends Controller
{
    public function index()
    {
        $blogs = DB::table('blogs')->where('active', 2)->get();
        return view('frontend.index',compact('blogs'));
    }
    public function about()
    {
        return view('frontend.about');
    }
}
