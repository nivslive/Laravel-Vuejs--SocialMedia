<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeModules extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {--group=} {--module=} {--controller} {--model} {--factory}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria módulos com base em um namespace geral e uma lista de módulos';

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    public function mkdirIfNotExists($dir) {
        if(!file_exists($dir)) {
            return mkdir($dir);
        }
        return;
    }
    public function handle()
    {
        if($this->option('group')) {
            $namespace = $this->option('group');
        }
        else {
            $namespace = $this->ask('Qual é o nome do grupo de modulos?');
        }

        if(!$this->option('controller')) {
            $modules = $this->ask('Quais módulos você gostaria de criar? (separe os nomes por espaço)');
        } else {
            if($this->option('module')) {
                $part = $this->option('module');
            } else {
                $part = $this->ask('Qual parte do módulo você gostaria de utilizar para criar o controller');
            }
            $controller = $this->ask('Qual o nome do controller?');
            $moduleDir = base_path("../Modules/{$namespace}/{$part}");
            $controllerModuleWord = ucwords($controller);
            $controllerPath = "{$moduleDir}/Controllers/{$controllerModuleWord}Controller.php";
            touch($controllerPath);
            $fileContents = file_get_contents(__DIR__."/Templates/Controller.txt");
            $fileContents = str_replace('{MODULEGROUP}', ucwords($namespace), $fileContents);
            $fileContents = str_replace('{MODULE}', ucwords($part), $fileContents);
            $fileContents = str_replace('{ENTITY}', ucwords($controller), $fileContents);

            $model = $this->ask('Gostaria de vincular o controller à um model?');
            if($model !== 'sim') {
                return;
            }
            $model = $this->ask('O model já existe?');
            if($model === 'sim') {
                return;
            }

            $model = $this->ask('Qual é o nome do model?');
            $fileContents = str_replace('{ENTITY}', ucwords($model), $fileContents);
            file_put_contents($controllerPath, $fileContents);
            return;
        }

        $modules = explode(' ', $modules);

        foreach ($modules as $module) {
            $moduleDir = base_path("Modules/{$namespace}/{$module}");
            if (!file_exists($moduleDir)) {
                mkdir($moduleDir, 0777, true);

                if(!$this->option('controller')):
                    #CONTROLLER (mas fui burro e fiz a regra das rotas)
                    $this->mkdirIfNotExists("{$moduleDir}/Controllers");
                    $controllerModuleWord = ucwords($module);
                    $controllerPath = "{$moduleDir}/Controllers/{$controllerModuleWord}Controller.php";
                    $fileContents = file_get_contents(__DIR__."/Templates/Controller.txt");
                    touch($controllerPath);
                    $fileContents = str_replace('{MODULEGROUP}', $namespace, $fileContents);
                    $fileContents = str_replace('{MODULE}', $controllerModuleWord, $fileContents);
                    $fileContents = str_replace('{ENTITY}', ucwords($module), $fileContents);
                    $fileContents = str_replace('{CONTROLLER}', ucwords($module) . 'Controller', $fileContents);
                    $fileContents = str_replace('{PATH1}', $module, $fileContents);
                    file_put_contents($controllerPath, $fileContents);
                endif;




                #MODELS
                mkdir("{$moduleDir}/Models");
                $modelModuleWord = ucwords($module);
                touch("{$moduleDir}/Models/{$modelModuleWord}.php");


                #MIGRATIONS
                mkdir("{$moduleDir}/Migrations");
                $migrationModuleWord = ucwords($module);


                #PRINCIPAL PROVIDER
                touch("{$moduleDir}/Provider.php");
                $fileContents = file_get_contents(__DIR__."/Templates/Provider.txt");
                $fileContents = str_replace('{MODULEGROUP}', $namespace, $fileContents);
                $fileContents = str_replace('{MODULE}', $modelModuleWord, $fileContents);
                file_put_contents("{$moduleDir}/Provider.php", $fileContents);

            }
        }
    }
}
