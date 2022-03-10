<?php
namespace Stephendevs\Pagman\Traits;

use Stephendevs\Pagman\Models\Post\Post;


trait PostTypeController {

    /**
     * Display a listing of the posts by its type.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($posttype = null)
    {
        $posts = $this->posts($posttype);
        $standard_posts = $this->standardPostTypes();
        $custom_posts = array_keys($this->customPostTypes());


        if ($posttype == null || in_array($posttype, $this->standardPostTypes())) {
            return (request()->expectsJson()) ? response()->json($posts) : view('pagman::posts.index', compact(['posts', 'standard_posts', 'custom_posts']));
        }

        if(in_array($posttype, array_keys($this->customPostTypes()))){
            $custom_post_types = $this->customPostTypes();
            return (request()->expectsJson()) ? response()->json($posts) : view($custom_post_types[$posttype].'.index', compact(['posts']));
        }

        return abort(404, 'unknown post type');
    }

    public function create($posttype = null)
    {
       $standard_posts = $this->standardPostTypes();

        if ($posttype == null || in_array($posttype, $this->standardPostTypes())) {
            return (request()->expectsJson()) ? response()->json($standard_posts) : view('pagman::posts.create', compact(['standard_posts']));
        }
        if(in_array($posttype, array_keys($this->customPostTypes()))){
            $custom_post_types = $this->customPostTypes();
            return view($custom_post_types[$posttype].'.create', compact(['standard_posts', 'custom_post_types']));
        }
        return 'unknown post type';
    }

    public function show($id, $posttype = null)
    {
        $post = $this->post($id, $posttype);
        $standard_posts = $this->standardPostTypes();

        if ($posttype == null || in_array($posttype, $this->standardPostTypes())) {
            return (request()->expectsJson()) ? response()->json($post, $standard_posts) : view('pagman::posts.show', compact(['standard_posts', 'post']));
        }

        if(in_array($posttype, array_keys($this->customPostTypes()))){
            $custom_post_types = $this->customPostTypes();
            return view($custom_post_types[$posttype].'.show');
        }

        return 'unknown post type';

    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $posttype = null)
    {
        $post = $this->post($id, $posttype);
        $standard_posts = $this->standardPostTypes();

        if ($posttype == null || in_array($posttype, $this->standardPostTypes())) {
            return (request()->expectsJson()) ? response()->json($post, $standard_posts) : view('pagman::posts.edit', compact(['standard_posts', 'post']));
        }

        if(in_array($posttype, array_keys($this->customPostTypes()))){
            $custom_post_types = $this->customPostTypes();
            return view($custom_post_types[$posttype].'.edit', compact(['post', 'standard_posts']));
        }

        return 'unknown post type';

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
        return back()->with('deleted', 'Post deleted successfully');
    }



    private function standardPostTypes()
    {

        return array_merge([
            'post', 'page'
        ], config(config('pagman.theme', 'pagman').'.standard_post_types', []));
    }

    private function customPostTypes()
    {
        return array_merge([
            'test' => 'pagman::tests'
        ], config(config('pagman.theme', 'pagman').'.custom_post_types', []));
    }

    private function posts($posttype = null)
    {
        $count = option('posts_pagination_count');
        return ($posttype) ? Post::with('author', 'menuItems', 'updatedby')->where('post_type', $posttype)->orderBy('created_at', 'desc')->paginate($count) : Post::with('author', 'menuItems', 'updatedby')->orderBy('created_at', 'desc')->paginate($count);
    }

    private function post($id, $posttype = null)
    {
        return ($posttype != null) ?  Post::with('author:id,name')->where('post_type', $posttype)->findOrFail($id) :  Post::with('author:id,name')->findOrFail($id);
    }
}