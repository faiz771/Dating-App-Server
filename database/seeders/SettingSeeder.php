<?php

namespace Database\Seeders;

use App\Models\SettingModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SettingModel::create(
            [
                'key' => "logo",
                'value' => "/images/logo.png",
            ]
        );
        SettingModel::create(
            [
                'key' => "appName",
                'value' => "Dating Stream",
            ]
        );
        SettingModel::create(
            [
                'key' => "favicon",
                'value' => "/favicon.ico",
            ]
        );
        SettingModel::create(
            [
                'key' => "currecny",
                'value' => "USD",
            ]
        );
    }
}
