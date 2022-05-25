<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Category;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller{
    public function index(){
        $posts = Post::all();

        return view("posts",[
            "posts" => $posts
        ]);
    }

    public function create(){
        $post = new Post();

        $categories = Category::all();

        return view("post",[
            "post" => $post,
            "categories"=> $categories
        ]);
    }

    public function edit($id){
        $post = Post::find($id);//busca no banco automaticamente

        $categories = Category::all();

        return view("post",[
            "post" => $post,
            "categories"=> $categories
        ]);
    }

    public function store(Request $request){
        $rules = [
            "category_id" => "required|exists:categories,id",
            "title" => "required|min:2",
            "summary" => "required",
            "text" => "required"
        ];

        $messages = [
            "title.required" => "O campo título deve ser preenchido.",
            "title.min" => "O campo título deve ter pelo menos 2 caracteres.",
            "category_id.required" => "O campo categoria deve ser preenchido.",
            "category_id.exists" => "Você deve selecionar uma categoria válida.",
            "summary" => "O campo resumo deve ser preenchido.",
            "text" => "O campo texto deve ser numérico."
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->route("postagensnovo")->withErrors($validator)->withInput();
        }

        $post = new Post();

        $post->category_id = $request->input("category_id");
        $post->title = $request->input("title");
        $post->summary = $request->input("summary");
        $post->text = $request->input("text");
        $post->active = $request->input("active");
        $post->url_image = $request->input("url_image");

        if($request->hasFile("url_image")){
            $path = $request->file("url_image")->store("public");
            $post->url_image = $path;
        }else{
            $post->url_image = "";
        }

        $post->save();

        return redirect()->route("postagens");
    }

    public function update($id, Request $request){
        $rules = [
            "category_id" => "required|exists:categories,id",
            "title" => "required|min:2",
            "summary" => "required",
            "text" => "required"
        ];

        $messages = [
            "title.required" => "O campo título deve ser preenchido.",
            "title.min" => "O campo título deve ter pelo menos 2 caracteres.",
            "category_id.required" => "O campo categoria deve ser preenchido.",
            "category_id.exists" => "Você deve selecionar uma categoria válida.",
            "summary" => "O campo resumo deve ser preenchido.",
            "text" => "O campo texto deve ser numérico."
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->route("postagensform", ["id" => $id])->withErrors($validator)->withInput();
        }


        $post = Post::find($id);

        $post->category_id = $request->input("category_id");
        $post->title = $request->input("title");
        $post->summary = $request->input("summary");
        $post->text = $request->input("text");
        $post->active = $request->input("active");
        $post->url_image = $request->input("url_image");

        if($request->hasFile("url_image")){
            Storage::delete($post->url_image);
            $path = $request->file("url_image")->store("public");
            $post->url_image = $path;
        }

        $post->save();

        return redirect()->route("postagens");
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();

        return redirect()->route("postagens");
    }


}