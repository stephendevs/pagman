<?php
namespace Stephendevs\Pagman;

use Stephendevs\Pagman\Models\Post\Post;
use Stephendevs\Pagman\Models\Page\Page;
use Illuminate\Http\Request;
/**
 * Controller for your standard pages
 * Standard pages are pages defined in your configuration file.
 * These pages often have posts that you may need to list and 
 * Do not use you default page theme template to preview you post.
 */

trait SPageController {

    public function index()
    {
        $page = $this->page();
        return (request()->expectsJson()) ? response()->json(['page' => $page]) : view($this->view(), compact(['page']));
    }

    private function page()
    {
        return ($this->pageKey()) ? Page::page($this->pageKey(), $this->with())->firstOrFail() : abort('404');
    }

    protected function pageKey()
    {
        return 'about';
    }
    protected function view()
    {
        return 'pagman::tests.index';
    }

    protected function with()
    {
        return [];
    }

}