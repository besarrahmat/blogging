<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return Blog::all();
    }

    public function getBlog($id)
    {
        try {
            $blog = Blog::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'blog not found'
            ], 404);
        }

        $id_blog = Blog::find($id);
        
        return response([
            'message' => 'show blog by id',
            'data' => $id_blog
        ], 200);
    }

    public function postBlog(Request $request)
    {
        $this->validate($request, [
            'penulis' => 'required',
            'judul' => 'required',
            'isi' => 'required'
        ]);

        $blog = Blog::create(
            $request->only(['penulis', 'judul', 'isi'])
        );

        return response()->json([
            'created' => true,
            'data' => $blog
        ], 201);
    }

    public function putBlog(Request $request, $id)
    {
        try {
            $blog = Blog::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'blog not found'
            ], 404);
        }
        
        $blog->fill(
            $request->only(['penulis', 'judul', 'isi'])
        );
        
        return response()->json([
            'updated' => true,
            'data' => $blog
        ], 200);
    }
    
    public function deleteBlog($id)
    {
        try {
            $blog = Blog::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'blog not found'
            ], 404);
        }
        
        $blog->delete();
        
        return response()->json([
            'deleted' => true
        ], 200);
    }
}