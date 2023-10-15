<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TranslationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $php_dir = resource_path('lang/' . App::getLocale());
        if (is_dir($php_dir)) {
            View::share(
                'translation',
                collect(File::allFiles($php_dir))
                    ->flatMap(
                        function ($file) {
                            return [
                                ($translation = $file->getBasename('.php')) => trans($translation),
                            ];
                        }
                    )->toJson()
            );
        } else {
            View::share('translation', "{}");
        }

        $json_dir = resource_path('lang/' . App::getLocale() . '.json');
        if (is_dir($json_dir)) {
            View::share('translationJson', File::get($json_dir));
        } else {
            View::share('translationJson', "{}");
        }
    }
}
