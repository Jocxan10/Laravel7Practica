<?php

use Illuminate\Database\Seeder;
use \App\Models\Config;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Config::create([
            'allow_registrations' => true
        ]);
    }
}
