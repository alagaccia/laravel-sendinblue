<?php
namespace AndreaLagaccia\Sendinblue;

use Illuminate\Support\ServiceProvider;

class SendinbluServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/sendinblue.php' => config_path('sendinblue.php'),
        ]);
    }
}
