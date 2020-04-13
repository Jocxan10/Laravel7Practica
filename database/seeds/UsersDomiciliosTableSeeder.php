<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersDomiciliosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_domicilios')->insert([
            [
                'user_id' => 1,
                'calle' => 'Obregon',
                'colonia' => 'Centro',
                'cp' => '80200',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'user_id' => 2,
                'calle' => 'Norte 3',
                'colonia' => 'Brisas de Humaya',
                'cp' => '80025',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'user_id' => 3,
                'calle' => 'Pascual Orozco',
                'colonia' => 'Nuevo Culiacán',
                'cp' => '80170',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ]);
    }
}
