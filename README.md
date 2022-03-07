# Russia Sanctions - Laravel

A small Laravel Middleware Plugin which blocks requests from IP
addresses linked with Russia and Belarus. A message explaining the war
and these sanctions is displayed.

## Installation

Install the package via composer:

```
composer require russia-sanctions/laravel
```

Edit `app/Http/Kernel.php` to setup the package as Global Middlware (so
that it is applied to all requests):

```
protected $middleware = [
    // ... other middlewares

    // This should normally be included _after_ the TrustProxies
    // middleware, if you are using it, so that Laravel can correctly
    // identify the source IP address.
    \RussiaSanctions\Laravel\Middleware::class,
];
```

