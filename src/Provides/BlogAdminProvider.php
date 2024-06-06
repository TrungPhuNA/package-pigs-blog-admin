<?php
/**
 * Created By PhpStorm
 * User: trungphuna
 * Date: 6/4/24
 * Time: 3:40 PM
 */
namespace Pigs\BlogAdmin\Provides;
use Illuminate\Support\ServiceProvider;

class BlogAdminProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'adm_blog');
        $this->mergeConfigFrom(
            __DIR__.'/../config/adm_blog_config.php','adm_blog_config'
        );

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/adm_blog'),
        ]);

        $this->publishes([
            __DIR__.'/../config/adm_blog_config.php' => config_path('adm_blog_config.php')
        ], 'adm_blog_config');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ],'adm_blog_migration');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}