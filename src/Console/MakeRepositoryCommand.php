<?php

namespace Gkalmoukis\Repositories\Console;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class MakeRepositoryCommand extends GeneratorCommand {

    protected $name = 'make:repository';

    protected $description = 'Create a new Repository class';

    protected $type = 'Repository';

    protected function getStub()
    {
        return __DIR__ . '/stubs/repository.php.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        if (is_null($this->option('model'))) {
            $this->error('You must provide a model class');
            return false;
        }
        return $rootNamespace . '\Repositories';
    }

    protected function getOptions()
    {
        return [
            ['model', null, InputOption::VALUE_REQUIRED, 'Add Model class name for repository.']
        ];
    }

    public function handle()
    {
        parent::handle();
        
        $this->createFilterFile();
    }

    protected function createFilterFile()
    {
        $class = $this->qualifyClass($this->getNameInput());
        $path = $this->getPath($class);
        $content = file_get_contents($path);
        $content =  str_replace('{{Model}}',$this->option('model'),$content);
        file_put_contents($path, $content);
    }
    
}