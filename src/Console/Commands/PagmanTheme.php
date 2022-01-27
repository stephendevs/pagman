<?php

namespace Stephendevs\Pagman\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Str;


class PagmanTheme extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pagman:theme 
    {--s|show : Show the current theme.}
    {--set : Set the theme to be managed by pagman .}'
    ;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'choose the theme to use';

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
        if($this->option('show')){
            $this->comment(config('pagman.theme', 'No theme set yet'));
            return;
        }

        //check if the env file really exists before going further
        if(file_exists($path = $this->envPath()) === false){
            $this->info('The env file seems not to exist');
            return;
        }

        if($this->option('set')){
            $theme = $this->ask('Enter theme name');
            $this->setTheme($theme);
            return;
        }


    }

    private function envPath()
    {
        if (method_exists($this->laravel, 'environmentFilePath')) {
            return $this->laravel->environmentFilePath();
        }
        return $this->laravel->basePath('.env');
    }

    private function setTheme($theme){
        if (Str::contains(file_get_contents($this->envPath()), 'PAGMAN_THEME') === false) {
            file_put_contents($this->envPath(), PHP_EOL."PAGMAN_THEME=$theme".PHP_EOL, FILE_APPEND);
        }else{
             // update existing entry
             file_put_contents($path = $this->envPath(), str_replace(
                'PAGMAN_THEME='.$this->laravel['config']['pagman.theme'],
                'PAGMAN_THEME='.$theme, file_get_contents($path)
            ));
        }

        $this->comment('Theme set to '.$theme.' successfully');
    }


}
