<?php

namespace Matthewbdaly\Harmony\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class TransformerMakeCommand extends GeneratorCommand
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
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Fractal transformer';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/console.stub';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the command.'],
        ];
    }
}
