<?php

namespace Stephendevs\Pagman\Http\Controllers\Page;

use Stephendevs\Pagman\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Stephendevs\Pagman\Http\Requests\PageRequest;


use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;

use Stephendevs\Pagman\Models\Post\Post;
use Stephendevs\Pagman\Models\Menu\Menu;

class PageController extends Controller
{
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages =  Post::with('author', 'menuItems', 'updatedby')->where('post_type', 'page')->orderBy('created_at', 'desc')->paginate(5);
        return view('pagman::page.index', compact(['pages']));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_keys = $this->pageKeys();
        return view('pagman::page.create', compact(['page_keys']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        
        $request->validated();

        $post = new Post();
        $post->post_title = $request->post_title;
        $post->post_key = ($request->post_key) ? $request->post_key : str_replace(' ', '-', $request->post_title);
        $post->extract_text = $request->extract_text;
        $post->post_content = $request->post_content;
        $post->post_type = 'page';
        $post->author_id = auth()->user()->id;
        $post->updatedby_id = auth()->user()->id;

        
        //dertermine if request has file
        $post->post_featured_image = ($request->hasFile('post_featured_image')) ? 'storage/'.request()->post_featured_image->store(config('pagman.media_dir', 'media/featuredimages'), 'public') : null;

        $post->save();

        return ($request->expectsJson()) ? response()->json(['success' => true,'message' => 'Post Created Successfully',], 200) : back()->withInput()->with('created', 'Post Created Successfully');

    }

    public function show($id)
    {
        return $page = Post::with(['author'])->findOrFail($id);
        return view('pagman::page.show', compact(['page']));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Post::findOrfail($id);
        $page_keys = $this->pageKeys();
        return view('pagman::page.edit', compact(['page', 'page_keys']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'post_title' => 'required|unique:posts,post_title,'.$id,
            'post_key' => 'nullable|unique:posts,post_key,'.$id,
            'extract_text' => 'nullable|min:3|max:200',
            'post_featured_image' => 'nullable|mimes:jpeg,png,jpg|max:2048'
        ]);

       $post = Post::with('author:id,name')->findOrFail($id);

        $post->post_title = $request->post_title;
        $post->extract_text = $request->extract_text;
        $post->post_content = (is_array($request->post_content)) ? json_encode($request->post_content) : $request->post_content;
        $post->updatedby_id = auth()->user()->id;

        //dertermine if request has file
        ($request->hasFile('post_featured_image'))
        ? $post->post_featured_image = 'storage/'.request()->post_featured_image->store(config('pagman.media_dir', 'media/featuredimages'), 'public')
        : '';


        $post->save();

        return ($request->expectsJson()) ? response()->json(['success' => true,'message' => 'Post Updated Successfully'], 200) : back()->withInput()->with('updated', 'Post Updated Successfully');
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
        return back()->with('deleted', 'Page deleted successfully');
    }


    public function menu()
    {
        $menus = Menu::with(['pages'])->get();
        $pages = Page::with(['menus'])->get();
        return response()->json(['pages' => $pages]);
    }

    private function pageKeys()
    {
        return config(config('pagman.theme', 'pagman').'.page_keys', []);
    }

}
