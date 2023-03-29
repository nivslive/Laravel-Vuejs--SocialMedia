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
        $namespace = $this->ask('Qual é o nome do namespace geral?');

        $modules = $this->ask('Quais módulos você gostaria de criar? (separe os nomes por espaço)');

        $modules = explode(' ', $modules);

        foreach ($modules as $module) {
            $moduleDir = base_path("modules/{$namespace}/{$module}");
            if (!file_exists($moduleDir)) {
                mkdir($moduleDir, 0777, true);
                mkdir("{$moduleDir}/Controllers");
                mkdir("{$moduleDir}/Models");
                mkdir("{$moduleDir}/Migrations");
                touch("{$moduleDir}/{$module}");
            }
        }
    }
}