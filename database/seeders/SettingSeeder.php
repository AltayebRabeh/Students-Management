<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::insert([
            ['key' => 'university_name', 'name' => 'إسم الجامعة', 'value' => 'كلية رابح التجريبية', 'type' => 'text'],
            ['key' => 'logo', 'name' => 'الشعار', 'value' => 'settings/logo.png', 'type' => 'image'],

            ['key' => 'report_header', 'name' => 'ترويسة التقارير', 'value' => 'كلية رابح التجريبية', 'type' => 'long-text'],
            ['key' => 'report_logo', 'name' => 'شعار التقرير', 'value' => 'settings/header_logo.png', 'type' => 'image'],
        ]);

        Cache::forever('settings', Setting::pluck('value', 'key'));
    }
}
