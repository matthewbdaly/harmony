<?php

namespace Matthewbdaly\Harmony\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Builds transformers
 */
class TransformerMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'harmony:transformer {name : The required name of the transformer class}';

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
        return __DIR__.'/stubs/transformer.stub';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the transformer.'],
        ];
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace The root namespace for the class.
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Transformers';
    }
}
