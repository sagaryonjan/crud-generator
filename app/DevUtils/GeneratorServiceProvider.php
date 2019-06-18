<?php

namespace App\DevUtils;

use Illuminate\Support\ServiceProvider;
use App\DevUtils\Console\CrudGenerator;

/**
 * Class GeneratorServiceProvider
 * @package Neputer\UtilApp\Generator\Providers
 */
class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([CrudGenerator::class]);

        $this->mergeConfigFrom(__DIR__ . '/config/generator.php', 'generator');
        $this->loadViewsFrom(__DIR__.'/views', 'generator');
    }
}
