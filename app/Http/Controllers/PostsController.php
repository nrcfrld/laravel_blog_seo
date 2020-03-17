<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(6);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|numeric',
            'gambar' => 'required|image'
        ]);

        $gambar = $request->gambar;
        $newGambar = time() . $gambar->getClientOriginalName();

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'gambar' => 'public/uploads/posts/' . $newGambar,
            'slug' => Str::slug($request->title),
            'user_id' => Auth::id()
        ]);

        $post->tag()->attach($request->tags);

        $gambar->move('public/uploads/posts/', $newGambar);
        return redirect()->back()->with('success', 'New post added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|numeric'
        ]);


        $post = Post::findOrFail($id);

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $newGambar = time() . $gambar->getClientOriginalName();
            $gambar->move('public/uploads/posts/', $newGambar);

            $post_data = [
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category_id,
                'gambar' => 'public/uploads/posts/' . $newGambar,
                'slug' => Str::slug($request->title)
            ];
        } else {
            $post_data = [
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category_id,
                'slug' => Str::slug($request->title)
            ];
        }

        $post->tag()->sync($request->tags);
        $post->update($post_data);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully, please check trash posts');
    }

    public function trash()
    {

        $posts = Post::onlyTrashed()->paginate(6);
        return view('admin.posts.deleted', compact('posts'));
    }

    public function restore($id)
    {
        Post::withTrashed()->where('id', $id)->restore();

        return redirect()->back()->with('success', 'Post has been restored');
    }

    public function forceDelete($id)
    {
        $post = Post::withTrashed()->where('id', $id);
        if (File::exists($post->first()->gambar)) {
            File::delete($post->first()->gambar);
        }

        $post->forceDelete();

        return redirect()->back()->with('success', 'Post has been deleted permanently');
    }
}
