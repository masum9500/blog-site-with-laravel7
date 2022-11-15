<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;
use DB;

class BlogController extends Controller
{
    public function list()
    {
        return view('frontend.blog-list');
    }
    public function post($id)
    {
        $blog = blog::where('id', $id)->first();
        $comment = DB::table('comments')->where('blog_id', $id)->get();
        $reply = DB::table('reply')->where('blog_id', $id)->get();
        return view('frontend.blog-post', compact('blog','comment', 'reply'));
    }
    public function addPost()
    {
        return view('backend.add_post');
    }
    public function viewPost()
    {
         $blog = DB::table('blogs')->get();
         return view('backend.Post_view', compact('blog'));
    }
    public function blogDetails($id)
    {
        $blogs = DB::table('blogs')->where('id', $id)->get();
        return view('backend.blogDetails', compact('blogs'));
    }
    public function commentAdd(Request $request)
    {
        DB::table('comments')->insert([
            'blog_id' => $request->blog_id,
            'user_id' => $request->user_id,
            'comment' => $request->comment
        ]);
        return redirect()->back();
    }
    public function replyComment(Request $request)
    {
        $data = DB::table('reply')->insert([
            'comment_id' => $request->comment_id,
            'blog_id' => $request->blog_id,
            'reply' => $request->reply
        ]);
        return redirect()->back();
    }
    public function updateStatus(Request $request)
    {
        DB::table('blogs')->where('id', $request->id)->update([
            'active' =>$request->active
        ]);
        return redirect()->back();
    }
}
