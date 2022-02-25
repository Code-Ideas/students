<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Collage;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function collagesList()
    {
        return response()->json(Collage::get(['id', 'name']));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::with('photo')->paginate(20);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Service::pluck('name', 'id');

        return view('admin.posts.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->input());
        if ($request->hasFile('image')) {
            $post->storeImage($request->file('image')->store('posts', 'public'));
        }

        return redirect()->route('admin.posts.index')->with('success', 'تم اضافة الخبر');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $sections = Service::pluck('name', 'id');

        return view('admin.posts.edit', compact('post', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->input());
        if ($request->hasFile('image')) {
            $post->updateImage($request->file('image')->store('posts', 'public'));
        }

        return redirect()->route('admin.posts.index')->with('success', 'تم تعديل الخبر');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'تم حذف الخبر');
    }
}
