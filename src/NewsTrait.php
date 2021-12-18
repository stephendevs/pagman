<?php
namespace Stephendevs\Pagman;

use Stephendevs\Pagman\Models\Post\Post;


trait NewsTrait {

    protected function latest()
    {
        return Post::latestNews($this->paginated(), $this->count());
    }

    protected function find($id)
    {
        return Post::findNews($id)->firstOrFail();
    }


    protected function paginated()
    {
        return false;
    }

    protected function count()
    {
        return 4;
    }

}