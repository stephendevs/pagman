<?php
namespace Stephendevs\Pagman;

use Stephendevs\Pagman\Models\Post\Post;
use Stephendevs\Pagman\Models\Page\Page;
use Illuminate\Http\Request;


trait WebPageController {

    public function index()
    {
        $page_key = last(request()->segments());
        $page = Post::with($this->with())->where('post_key', $page_key)->where('sp', '0')->firstOrFail();
        return (request()->expectsJson()) ? response()->json($page) : view($this->view(), compact(['page']));
    }

    protected function view()
    {
        return 'pagman::tests.index';
    }

    protected function with()
    {
        return [
            'media', 
            'categories'
        ];
    }

}