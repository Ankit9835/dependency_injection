<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Auth;

class PostController extends Controller
{
    //

 public function __construct(Post $posts)
    {
        $this->posts = $posts;
    }

    public function index(){
       $posts = $this->posts->all();
        return view('post.index',compact('posts'));
    }

    public function create(){
        return view('post.create');
    }

    public function store(Request $request){

        $this->posts->title = $request->title;
        $this->posts->description = $request->description;
        $this->posts->user_id = Auth::User()->id;

        $this->posts->save();

        return redirect()->route('post.index')->with('message', 'Data Inserted');


    }

    public function edit(Post $post, $id){
        $posts = $post->find($id);
        return view('post.edit',compact('posts'));
    }

    public function update(Request $request, $id){

     $post = $this->posts->find($id);

     $post->title = $request->title;
     $post->description = $request->description;

     $post->save();


        return redirect()->route('post.index')->with('message', 'Data Updated');
    }

    public function remove($id){

        $post = $this->posts->find($id);
        $post->delete();

        return redirect()->route('post.index')->with('message', 'Data Deleted');

    }
}
