<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Observers\SettingObserver;

class SettingServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Setting::observe(SettingObserver::class);

        $setting = cache()->rememberForever('global_setting', function () {
            return Setting::first();
        });

        view()->share('setting', $setting);
    }
}
