# online-users-laravel
## Show the users online in your Laravel application

## Instalation

install directly via composer

```
composer require tusharthe/online-users-laravel
```

After composer command, register service prodiver in `app/config/app.php` under providers:
```php 
    tusharthe\OnlineUsers\OnlineUsersServiceProvider::class,
```    


After this, add new middleware in `app/Http/Kernel.php` :

```php
  \tusharthe\OnlineUsers\Middleware\UsersOnline::class,
```

After this, add the Library (trait) in your model User in `app/User.php`:

```php

class User extends Authenticatable
{
       use \tusharthe\OnlineUsers\Library\OnlineUsers;       
...
}

```

After this, add the event in your EventServiceProvider in `app/Providers/EventServiceProvider.php` 
under `'protected $listen = '`  :
## NOTE: in laravel 5.5 or above aumatically register event 
```php
        'Illuminate\Auth\Events\Logout' => [
            'tusharthe\OnlineUsers\Listeners\LogoutListener',
        ],
```


Finally run `php artisan vendor:publish` for add the namespaces & select appropriate Provider  `tusharthe\OnlineUsers\OnlineUsersServiceProvider`. 

## How To Use:

To get all Online Users just use the method `allOnline()` Like below:

```php
$user = new User;
$user->allOnline();
```

Or if you want to check if a specific user is online or not use the method `isOnline()`:

```php
$user = User::find($id);
$user->isOnline();
```

You Can also able to to set timming of user in `app/config/OnlineUser.php` 
Default 3 min is set.

## Laravel compatibility
       5.4 or above    
