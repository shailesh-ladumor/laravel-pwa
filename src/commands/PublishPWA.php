<?php

namespace Ladumor\LaravelPwa\commands;

use Illuminate\Support\Facades\File;
use Illuminate\Console\Command;

class PublishPWA extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'laravel-pwa:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish Service Worker|Offline HTMl|manifest file for PWA application.';

    public $composer;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->composer = app()['composer'];
    }

    public function handle()
    {
        $publicDir = public_path();

        $manifestTemplate = file_get_contents(__DIR__ . '/../stubs/manifest.stub');
        $this->createFile($publicDir . DIRECTORY_SEPARATOR, 'manifest.json', $manifestTemplate);
        $this->info('manifest.json file is published.');

        $offlineHtmlTemplate = file_get_contents(__DIR__ . '/../stubs/offline.stub');
        $this->createFile($publicDir . DIRECTORY_SEPARATOR, 'offline.html', $offlineHtmlTemplate);
        $this->info('offline.html file is published.');

        $swTemplate = file_get_contents(__DIR__ . '/../stubs/sw.stub');
        $this->createFile($publicDir . DIRECTORY_SEPARATOR, 'sw.js', $swTemplate);
        $this->info('sw.js (Service Worker) file is published.');

        $swTemplate = file_get_contents(__DIR__ . '/../stubs/pwa-install.stub');
        $this->createFile($publicDir . DIRECTORY_SEPARATOR, 'pwa-install.js', $swTemplate);
        $this->info('pwa-install.js (custom install button) file is published.');


        $logoPath = $publicDir . DIRECTORY_SEPARATOR . 'logo.png';
        if (!file_exists($logoPath)) {
            if (copy(__DIR__ . '/../stubs/logo.png', $logoPath)) {
                $this->info('Default logo published.');
            }
        }

        $this->info('Generating autoload files');
        $this->composer->dumpOptimized();

        $this->info('Greeting!.. Enjoy PWA site...');
    }

    public static function createFile($path, $fileName, $contents)
    {
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $path = $path . $fileName;

        file_put_contents($path, $contents);
    }
}
