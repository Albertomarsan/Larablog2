<?php

namespace App\Http\Controllers;

use App\Category;
use App\Exceptions\LimitPostException;
use App\Post;
use App\PostImage;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostPost;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class PostController extends Controller
{


    public function __construct()
    {
       $this->middleware('auth'); // Redirije todas las rutas al login
      // $this->middleware('rol.admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3); //sustituye a ->get()
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::get();
        if(count($posts) >= 5){
            throw new LimitPostException();
        }else{
            $categories = Category::pluck('id', 'title');
            return view("posts.create", ['post' => new Post(), 'categories' => $categories]);
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostPost $request)
    {
        Post::create($request->validated());
        return back()->with('status', 'Post creado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$post = Post::findOrFail($id);

        return view('posts.show', ["post" => $post]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');
        return view('posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostPost $request, Post $post)
    {
        $post->update($request->validated());
        return back()->with('status', 'Post actualizado con éxito');
    }

    public function image(Request $request, Post $post)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png|max:10240' //10mb
        ]);

        $fileName = time() . '.' . $request->image->extension(); // renombra la imagen del usuario
        $request->image->move(public_path('images'), $fileName); // guarda la imagen del usuario en public/images

        echo 'Fichero: ' . $fileName;

        PostImage::create(['image' => $fileName, 'post_id' => $post->id]);
        return back()->with('status', 'Imagen guardada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('status', 'Post eliminado con éxito');

    }
}
