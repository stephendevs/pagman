<?php

namespace Stephendevs\Pagman\Console\Commands;

use Illuminate\Console\Command;

use Stephendevs\Pagman\Models\Post\Post;

class PostSeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert Theme Default Data Into The Posts Table .....';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->seed();
    }

    private function seed()
    {
        $data = config('data.posts', []);
        if (count($data)) {
            $this->info('Seeding Posts Table......');
            for ($i=0; $i < count($data) ; $i++) { 
                # code...
                Post::create([
                    'post_name' => (array_key_exists('post_name', $data[$i])) ?  $data[$i]['post_name'] : 'post_name',
                    'post_content' => (array_key_exists('post_content', $data[$i])) ?  $data[$i]['post_content'] : null,
                    'extract_text' => (array_key_exists('extract_text', $data[$i])) ?  $data[$i]['extract_text'] : null,
                    'post_type' => (array_key_exists('post_type', $data[$i])) ?  $data[$i]['post_type'] : 'post_type',
                    'post_featured_image' => (array_key_exists('post_featured_image', $data[$i])) ?  $data[$i]['post_featured_image'] : null,
                ]);
            }
            $this->info('Done Seeding Posts Table');
        }
    }
}
