<?php

namespace Stephendevs\Pagman\Http\Controllers\Post;

use Stephendevs\Pagman\Http\Controllers\Controller;
use Illuminate\Http\Request;

use  Stephendevs\Pagman\Models\Post\Post;
use Stephendevs\Pagman\Http\Requests\PostRequest;

class PostController extends Controller
{
    
     /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($posttype = null)
    {
        $posts = Post::with('author')->posts($posttype, true, 4);
        return view('pagman::posts.index', compact(['posts']));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagman::posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $request->validated();

        $post = new Post();
        $post->post_title = $request->post_title;
        $post->post_key = str_replace(' ', '-', $request->post_title);
        $post->extract_text = $request->extract_text;
        $post->post_content = (is_array($request->post_content)) ? json_encode($request->post_content) : $request->post_content;
        $post->post_type = $request->post_type;

        //dertermine if request has file
        $post->post_featured_image = ($request->hasFile('post_featured_image')) ? request()->post_featured_image->store(config('pagman.media_dir', 'media/featuredimages'), 'public') : null;


        $post->save();

        //response for ajax
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Post Created Successfully',
            ], 200);
        }
        return back()->withInput()->with('success', 'Page Created Successfully');
    }

    public function show($id)
    {
        $post = Post::with('author:id,username')->findPost('id', $id)->firstOrFail();
        return view('pagman::posts.edit', compact(['post']));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with('author:id,username')->findPost('id', $id)->firstOrFail();
        return view('pagman::posts.edit', compact(['post']));
    }

    public function update(PostRequest $request, $id)
    {
        $request->validated();
        $post = Post::with('author:id,username')->findPost('id', $id)->firstOrFail();

        $post->post_title = $request->post_title;
        $post->extract_text = $request->extract_text;
        $post->post_content = (is_array($request->post_content)) ? json_encode($request->post_content) : $request->post_content;
        $post->post_type = $request->post_type;

        //dertermine if request has file
        $post->post_featured_image = ($request->hasFile('post_featured_image')) ? request()->post_featured_image->store(config('pagman.media_dir', 'media/featuredimages'), 'public') : null;


        $post->save();

        //response for ajax
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Post Editted Successfully',
            ], 200);
        }

        return back()->withInput()->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return back()->with('success', 'Post deleted successfully');
    }

}
