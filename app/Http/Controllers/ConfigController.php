<?php

namespace App\Http\Controllers;

use App\Constants\KeyConst;
use App\Models\Config;
use App\Services\ConfigService;
use Barryvdh\Debugbar\Facades\Debugbar;

class ConfigController extends Controller
{
    public function __invoke(): void
    {
        Debugbar::startMeasure('render_test', 'Get the value from ENV');
        $env_result = env('KEY_1');
        Debugbar::stopMeasure('render_test');

        Debugbar::startMeasure('render_test', 'Get the value from an abstract static class');
        $env_result = KeyConst::KEY_1;
        Debugbar::stopMeasure('render_test');

        Debugbar::startMeasure('render_test', 'Get the value from MODEL class');
        $model_result = Config::KEY_1;
        Debugbar::stopMeasure('render_test');

        Debugbar::startMeasure('render_test', 'Get the value from DB');
        $db_result = Config::where('key', 'KEY_1')->first()->value;
        Debugbar::stopMeasure('render_test');

        Debugbar::startMeasure('render_test', 'Get the value from REDIS first time');
        $cache_result = ConfigService::key('KEY_1');
        Debugbar::stopMeasure('render_test');

        Debugbar::startMeasure('render_test', 'Get the value from REDIS');
        $cache_result = ConfigService::key('KEY_1');
        Debugbar::stopMeasure('render_test');

        dump('done.', [
            $model_result,
            $db_result,
            $cache_result,
            $cache_result,
            $env_result,
        ]);
    }
}
