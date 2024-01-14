<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Post;
class HomeController extends Controller
{
    public function index(){
        
        $search = request('search');
        if($search){
            $posts = Post::where([
                ['title', 'like', '%' . $search . '%']
            ])->orderby('created_at', 'desc')->get();
        }else{
            $posts = Post::limit(12)->orderby('created_at','desc')->get();
        }
       
        return view('welcome', ['posts' => $posts]);
    }
}
