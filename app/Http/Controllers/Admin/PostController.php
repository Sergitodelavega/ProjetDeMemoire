<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.edit');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'bail|required|string|max:255',
            "picture" => 'bail|required|image',
            "content" => 'bail|required',
        ]);

        $chemin_image = $request->picture->store("posts");
        Post::create([
            "title" => $request->title,
            "picture" => $chemin_image,
            "content" => $request->content,
        ]);

        return redirect(route("posts.index"));
    }

    public function show(Post $post)
    {
        return view("admin.posts.show", compact("post"));
    }

    public function edit(Post $post)
    {
        return view("admin.posts.edit", compact("post"));
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'bail|required|string|max:255',
            "content" => 'bail|required',
        ];

        if ($request->has("picture")) {
            $rules["picture"] = 'bail|required|image';
        }
        $this->validate($request, $rules);

        if ($request->has("picture")) {
            Storage::delete($post->picture);
            $chemin_image = $request->picture->store("posts");
        }

        $post->update([
            "title" => $request->title,
            "picture" => isset($chemin_image) ? $chemin_image : $post->picture,
            "content" => $request->content
        ]);

        return redirect(route("posts.show", $post));
    }

    public function destroy(Post $post)
    {
        Storage::delete($post->picture);
        $post->delete();
        return redirect(route('posts.index'));
    }
}
