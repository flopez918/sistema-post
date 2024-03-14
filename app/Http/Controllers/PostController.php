<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Libreria para obtener instancia de almacenamiento 


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postlist = Post::all(); 

        
        $postOne = Post::orderBy('id', 'DESC')->first();
        
        return view('post',[ 
            'postlist' => $postlist,
            'postOne' => $postOne
         ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newPost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        if ($request->hasFile('image')) { // Si hay imagen 

            Post::create([
                'title' => $request->title,
                'post' => $request->post,
                'image' => $request->file('image')->store('uploads','public'), // guarda y sube la imagen
            ]);
        }


        return redirect('post');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post=Post::findOrFail($id);  // Recupera información
        return view('editPost', compact('post')); // Envia al formulario
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datosPost = request()->except(['_token','_method']); // No recepciona token y método 
        
        if ($request->hasFile('image')) { // Si hay imagen 
            $post=Post::findOrFail($id);  // Recupera información
            Storage::delete('public/'.$post->image); // Se elimina la imagen
            $datosPost['image']=$request->file('image')->store('uploads', 'public'); // subir la imagen en la carpeta uploads si existe
        }
        
        Post::where('id','=',$id)->update($datosPost);  // actualiza los datosPost en el Modelo de un registro

        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $post=Post::findOrFail($id);  // Recupera información
        if(Storage::delete('public/'.$post->image)) // Se borra la imagen de la carpeta uploads
        {
            Post::destroy($id);
        }

        return redirect('post');
    }
}
