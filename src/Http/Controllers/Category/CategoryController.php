<?php

namespace Stephendevs\Pagman\Http\Controllers\Category;

use Stephendevs\Pagman\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Stephendevs\Pagman\Models\Category\Category;

class CategoryController extends Controller
{
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('pagman::categories.index', compact(['categories']));
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
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|unique:categories,name',
            'description' => 'nullable',
            'parent' => 'nullable'
        ]);

        $category = new Category();

        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = ($request->parent) ? $request->parent : null;

        $category->save();
        return ($request->expectsJson()) ? response()->json(['success' => true,'message' => 'Category Created Successfully',], 200) : back()->withInput()->with('created', 'Category Created Successfully');
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
        Category::destroy($id);
        return (request()->expectsJson()) ? response()->json(['success' => true, 'message' => 'Category Deleted Successfully']) : back()->with('deleted', 'Category deleted successfully');
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
