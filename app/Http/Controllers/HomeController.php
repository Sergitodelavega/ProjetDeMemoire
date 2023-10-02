<?php

namespace App\Http\Controllers;

use App\Models\Doctorant;
use App\Models\Post;
use App\Models\These;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::all()->take(3);
        return view('front.home.index', compact('posts'));
    }

    public function posts(){
        $posts = Post::latest()->get();
        return view('front.home.posts.index', compact('posts'));
    }

    public function showPost($id){
        $post = Post::findOrFail($id);
        return view('front.home.posts.show', compact('post'));
    }

    public function theses(){
        $theses = These::all();
        $doctorants = Doctorant::all();
        return view('front.home.theses', compact('theses', 'doctorants'));
    }

    public function showTheses(){
        
    }

}
