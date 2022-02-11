<?php

namespace App\Services;

use App\Models\Config;
use Illuminate\Support\Facades\Cache;

class ConfigService
{
    public static function key(string $key, $default = null)
    {
        $configs = Cache::rememberForever('configs', function () {
            return Config::orderBy('key', 'ASC')
                ->get()
                ->pluck('value', 'key')
                ->toArray();
        });

        return array_key_exists($key, $configs) ? $configs[$key] : $default;
    }
}
