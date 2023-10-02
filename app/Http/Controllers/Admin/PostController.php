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
         // 1. La validation
    $this->validate($request, [
        'title' => 'bail|required|string|max:255',
        "picture" => 'bail|required|image',
        "content" => 'bail|required',
    ]);

    // 2. On upload l'image dans "/storage/app/public/posts"
    $chemin_image = $request->picture->store("posts");

    // 3. On enregistre les informations du Post
    Post::create([
        "title" => $request->title,
        "picture" => $chemin_image,
        "content" => $request->content,
    ]);

    // 4. On retourne vers tous les posts : route("posts.index")
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

        // Si une nouvelle image est envoyée
        if ($request->has("picture")) {
            // On ajoute la règle de validation pour "picture"
            $rules["picture"] = 'bail|required|image|max:1024';
        }
        $this->validate($request, $rules);

        // 2. On upload l'image dans "/storage/app/public/posts"
        if ($request->has("picture")) {
            //On supprime l'ancienne image
            Storage::delete($post->picture);

            $chemin_image = $request->picture->store("posts");
        }

        // 3. On met à jour les informations du Post
        $post->update([
            "title" => $request->title,
            "picture" => isset($chemin_image) ? $chemin_image : $post->picture,
            "content" => $request->content
        ]);

        // 4. On affiche le Post modifié : route("posts.show")
        return redirect(route("posts.show", $post));
    }

    public function destroy(Post $post)
    {
        // On supprime l'image existant
        Storage::delete($post->picture);

        // On les informations du $post de la table "posts"
        $post->delete();

        // Redirection route "posts.index"
        return redirect(route('posts.index'));
    }
}
