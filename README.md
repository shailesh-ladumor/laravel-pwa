# Laravel PWA

## You can follow this video tutorial as well for installation.

[<img src="https://img.youtube.com/vi/9H-T81KQPyo/0.jpg" width="250">](https://youtu.be/9H-T81KQPyo)

## Installation

Install the package by the following command,

    composer require ladumor/laravel-pwa

## Add Provider

Add the provider to your `config/app.php` into `provider` section if using lower version of laravel,

    Ladumor\LaravelPwa\PWAServiceProvider::class,

## Add Facade

Add the Facade to your `config/app.php` into `aliases` section,

    'LaravelPwa' => \Ladumor\LaravelPwa\LaravelPwa::class,

## Publish the Assets

Run the following command to publish config file,

    php artisan laravel-pwa:publish

## Configure PWA
 Add following code in root blade file in header section.

    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

Add following code in root blade file in before close the body.

    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function (reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>

### License
The MIT License (MIT). Please see [License](LICENSE.md) File for more information   
