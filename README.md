[![Latest Stable Version](https://poser.pugx.org/ladumor/laravel-pwa/v)](https://packagist.org/packages/ladumor/laravel-pwa)
[![Daily Downloads](https://poser.pugx.org/ladumor/laravel-pwa/d/daily)](https://packagist.org/packages/ladumor/laravel-pwa)
[![Monthly Downloads](https://poser.pugx.org/ladumor/laravel-pwa/d/monthly)](https://packagist.org/packages/ladumor/laravel-pwa)
[![Total Downloads](https://poser.pugx.org/ladumor/laravel-pwa/downloads)](https://packagist.org/packages/ladumor/laravel-pwa)
[![License](https://poser.pugx.org/ladumor/laravel-pwa/license)](https://packagist.org/packages/ladumor/laravel-pwa)
[![PHP Version Require](https://poser.pugx.org/ladumor/laravel-pwa/require/php)](https://packagist.org/packages/ladumor/laravel-pwa)

# Laravel PWA
## You can follow this video tutorial as well for installation.

[<img src="https://img.youtube.com/vi/9H-T81KQPyo/0.jpg" width="250">](https://youtu.be/9H-T81KQPyo)

## Watch Other Lavavel tutorial here
[<img src="https://img.youtube.com/vi/yMtsgBsqDQs/0.jpg" width="580">](https://www.youtube.com/channel/UCuCjzuwBqMqFdh0EU-UwQ-w?sub_confirmation=1))

## Installation

Install the package by the following command, (try without `--dev` if you want to install it on production environment)

    composer require --dev ladumor/laravel-pwa


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
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

Add following code in root blade file in before close the body.

    <script src="{{ asset('/sw.js') }}"></script>
    <script>
       if ("serviceWorker" in navigator) {
          // Register a service worker hosted at the root of the
          // site using the default scope.
          navigator.serviceWorker.register("/sw.js").then(
          (registration) => {
             console.log("Service worker registration succeeded:", registration);
          },
          (error) => {
             console.error(`Service worker registration failed: ${error}`);
          },
        );
      } else {
         console.error("Service workers are not supported.");
      }
    </script>

### Custom Install Button
You can add custom install button in your blade file by using the following code.

    <!-- Add this inside <body> -->
    <button id="pwa-install-btn" style="display:none; position: fixed; bottom: 20px; right: 20px; padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 8px; z-index: 1000;">
       Install App
    </button>

Also include the JS: (Add following code in root blade file in before close the body.)

     <script src="{{ asset('pwa-install.js') }}"></script>

### License
The MIT License (MIT). Please see [License](LICENSE.md) File for more information   

<a href="https://www.buymeacoffee.com/ladumor" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-red.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;" ></a>

## Note
 PWA only works with https. so, you need to run either with  `php artisan serve` or create a virtual host with https.
 you can watch the video for how to create a virtual host with HTTPS

[<img src="https://img.youtube.com/vi/D5IqDcHyXSQ/0.jpg" width="550">](https://youtu.be/D5IqDcHyXSQ)
