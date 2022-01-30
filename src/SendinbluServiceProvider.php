<?php
namespace AndreaLagaccia\Sendinblue;

use Illuminate\Support\ServiceProvider;

class SendinbluServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/sendinblue.php', 'sendinblue');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/sendinblue.php' => config_path('sendinblue.php'),
            ], 'sendinblue-config');
       }
    }
}
