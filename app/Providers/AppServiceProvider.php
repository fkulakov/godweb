<?php declare(strict_types=1);

namespace App\Providers;

use App\Services\Times\Providers\FileProvider;
use App\Services\Times\TimesService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TimesService::class, function () {
            return new TimesService(new FileProvider());
        });
    }
}
