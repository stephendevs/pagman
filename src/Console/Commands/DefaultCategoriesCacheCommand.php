<?php

namespace Stephendevs\Pagman\Console\Commands;

use Illuminate\Console\Command;

use Stephendevs\Pagman\Models\Post\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class DefaultCategoriesCacheCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'defaultcategories:cache {--fresh}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cache default categorires defined in theme configuration';

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
        $categories = config(theme().'.categories', []);
        if (count($categories)) {
            # code...
            ($this->option('fresh')) ? Cache::forever('categories', $categories) : Cache::forever('categories', $categories);
            $this->info('Default categories added to cache successfully ...');
        } else {
            # code...
            $this->info('No categories to cache ....');
        }
        
    }
   
}
