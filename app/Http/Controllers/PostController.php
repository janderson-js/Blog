<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function show($id){
        $post = Post::with(['user', 'comments' => function ($query) use ($id) {
            $query->with('user', 'answers.user', 'answers.replies.user') // Carrega usuário dos comentários, respostas e respostas das respostas
                ->orderBy('created_at', 'desc');
        }])->find($id);
        
        
        return view('posts.show', ['post' => $post]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){

        $post = new Post;

        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->user()->id;

         // Image Upload
         if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = '/img/posts/'. md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;

            $requestImage->move(public_path('img/posts'), $imageName);

            $post->thumb = $imageName;
        }

        $post->save();

        return redirect('/')->with('msg', 'Post criado com sucesso!');
    }

    public function dashboard(){
        $user = auth()->user();
        $posts = ( $user->posts) ? $user->posts : null;

        return view('dashboard', ['posts' => $posts]);
    }

    public function postOwnerUser($postId){
        $post = Post::findOrFail($postId);
        return auth()->user()->id == $post->user_id;
    }

    public function edit($id){

        if($this->postOwnerUser($id)){
            $post = Post::findOrFail($id);
            return view('posts.edit', ['post' => $post]);
        }

        return \redirect('/');
    }

    public function update(Request $request){

        $data = $request->all();

        $post = Post::findOrFail($request->id);
        $oldImagePath = $post->thumb;

         // Image Upload
        if ($request->hasFile('thumb') && $request->file('thumb')->isValid()) {
            $requestImage = $request->thumb;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;

            $requestImage->move(public_path('/img/posts'), $imageName);

            // Exclui a imagem antiga se ela existir
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $data['thumb'] = '/img/posts/' . $imageName;
        }
        //unset($data['image']);
        Post::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg','Post Alterado com sucesso!!');
    }

    public function destroy($id){

        $postId = $id;
        $post = Post::findOrFail($id);
        $oldImagePath = public_path('img/posts') . '/' . $post->thumb;

        if (Post::findOrFail($postId)->delete()) {
            // Exclui a imagem antiga se ela existir
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        return redirect('/dashboard')->with('msg', 'Post Deletado com sucesso!!');
    }
    
}
