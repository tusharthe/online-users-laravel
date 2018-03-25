<?php

namespace tusharthe\OnlineUsers;

use Illuminate\Support\ServiceProvider;

class OnlineUsersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/OnlineUser.php' => config_path('OnlineUser.php')
        ], 'OnlineUser');
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
