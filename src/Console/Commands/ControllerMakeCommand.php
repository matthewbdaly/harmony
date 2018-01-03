<?php

namespace Matthewbdaly\Harmony\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Builds controllers
 */
class ControllerMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'harmony:controller {name : The required name of the controller class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Harmony controller';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Harmony controller';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/controller.stub';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the controller.'],
        ];
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace The root namespace for the class.
     * @return string
     */
    protected function getDefaultNamespace(string $rootNamespace)
    {
        return $rootNamespace.'\Http\Controllers';
    }
}
