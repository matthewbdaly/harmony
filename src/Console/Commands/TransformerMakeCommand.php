<?php

namespace Matthewbdaly\Harmony\Console\Commands;

use Illuminate\Console\Command;

class TransformerMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:transformer {name : The required name of the transformer class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Fractal transformer';

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
        $name = $this->argument('name');
    }
}
