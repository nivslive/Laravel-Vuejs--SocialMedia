<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

#use Database\Factories\ReactionFactory;
use Database\Seeders\ThemeSeeder;
use Illuminate\Database\Seeder;
use Modules\Social\Reaction\Models\ReactionType;
use Modules\Social\Reaction\Database\Factories\{ReactionFactory, ReactionTypeFactory};
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function modulesFactories($module, $optionals = []) {
        $modulesPath = base_path('../Modules/' . $module);
        //dd($modulesPath);
        // Itera sobre todos os diretórios de módulos
        foreach (scandir($modulesPath) as $moduleName) {
            if (in_array($moduleName, ['.', '..']) || !is_dir("$modulesPath/$moduleName")) {
                continue;
            }

            // Verifica se existe uma factory no módulo e a chama
            $factoryClass = "\\Modules\\". $module ."\\$moduleName\\Database\\Factories\\$moduleName" . 'Factory';
            if (class_exists($factoryClass)) {
                $model = '\\Modules\\'. $module .'\\'.$moduleName.'\\Models\\'.$moduleName;
                $factory = $factoryClass::new();
                //$factory = $factory->of($model::class);
                $factory->create();
            }

            foreach($optionals as $optional) {
                // Verifica se existe uma factory no módulo e a chama
                $optionalClass = "\\Modules\\". $module ."\\".$moduleName."\\Database\\Factories\\".$optional[0]. 'Factory';
                if (class_exists($optionalClass)) {
                    var_dump($factoryClass);
                    $model = '\\Modules\\'. $module .'\\'.$moduleName.'\\Models\\'.$moduleName;
                    //$model::factory($optionalClass)->create();
                    $factory = $optionalClass::new();
                    //$factory = $factory->of($model::class);
                    $factory->count($optional[1])->create();
                }
            }
        }


    }

    public function moduleFactory($module, $count = 1){
        return $module->count($count)->create();
    }

    public function run()
    {
        \App\Models\User::factory(9)->create();
        \App\Models\Theme::factory(10)->create();
        \App\Models\Subject::factory(50)->create();
        \App\Models\Message::factory(200)->create();
        \App\Models\Reply::factory(200)->create();
        //ReactionType::factory(ReactionTypeFactory::class)->create();
        //\App\Models\Reaction::factory(1)->create();

        $this->moduleFactory(ReactionTypeFactory::new());
        $this->moduleFactory(ReactionFactory::new());

        /*$this->modulesFactories('Social', [
            ['ReactionType', 1]
        ]);*/

    }
}
