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
            __DIR__.'/../config/brevo.php' => config_path('brevo.php'),
        ]);
    }
}
