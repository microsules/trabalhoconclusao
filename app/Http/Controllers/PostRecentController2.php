<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller\Auth;
use App\Post;

class PostRecentController2 extends Controller{
    public function index(){
        $posts = Post::all()->where('active', true)->sortByDesc('created_at')->take(3);
        // $posts = Post::where('active', true)->orderBy('created_at', 'DESC')->take(3)->get();


        return view("postsRecent2",[
            "posts" => $posts
        ]);
    }

}