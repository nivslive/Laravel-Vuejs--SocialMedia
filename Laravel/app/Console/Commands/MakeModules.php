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
    protected $signature = 'make:module';

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
    public function handle()
    {
        $namespace = $this->ask('Qual é o nome do grupo de modulos?');

        $modules = $this->ask('Quais módulos você gostaria de criar? (separe os nomes por espaço)');

        $modules = explode(' ', $modules);

        foreach ($modules as $module) {
            $moduleDir = base_path("../Modules/{$namespace}/{$module}");
            if (!file_exists($moduleDir)) {
                mkdir($moduleDir, 0777, true);
                mkdir("{$moduleDir}/Controllers");
                $controllerModuleWord = ucwords($module);
                touch("{$moduleDir}/Controllers/{$controllerModuleWord}Controller.php");
                mkdir("{$moduleDir}/Models");
                touch("{$moduleDir}/Models/Provider.php");
                $modelModuleWord = ucwords($module);
                touch("{$moduleDir}/Controllers/{$modelModuleWord}.php");
                mkdir("{$moduleDir}/Migrations");
                touch("{$moduleDir}/Provider.php");
                $fileContents = file_get_contents(__DIR__."/Templates/Provider.txt");
                $fileContents = str_replace('{MODULEGROUP}', $namespace, $fileContents);
                $fileContents = str_replace('{MODULE}', $modelModuleWord, $fileContents);
                file_put_contents("{$moduleDir}/Provider.php", $fileContents);
            }
        }
    }
}
