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