<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 20) as $element) {
            Config::factory()
                ->create([
                    'key' => "KEY_{$element}",
                    'value' => str()->random(5),
                ]);
        }
    }
}
