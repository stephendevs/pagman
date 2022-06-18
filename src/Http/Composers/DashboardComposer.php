<?php
namespace Stephendevs\Pagman\Http\Composers;

use Illuminate\View\View;

use Stephendevs\Pagman\Models\Post\Post;

class DashboardComposer
{
    public function compose(View $view)
    {
        $pages_count = count(Post::where('post_type', 'page')->get());
        $posts_count = count(Post::all());
        $view->with(compact(['pages_count', 'posts_count']));
    }
}