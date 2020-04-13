<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Jocxan Fragozo',
                'email' => 'j@ie-soluciones.com',
                'email_verified_at' => Carbon::now()->toDateTimeString(),
                'password' => bcrypt('secret'),
                'telefono' => '6671948031',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 2,
                'name' => 'Luis Ramirez',
                'email' => 'l@ie-soluciones.com',
                'email_verified_at' => Carbon::now()->toDateTimeString(),
                'password' => bcrypt('secret'),
                'telefono' => '6671948031',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 3,
                'name' => 'Diego Galvez',
                'email' => 'd@ie-soluciones.com',
                'email_verified_at' => Carbon::now()->toDateTimeString(),
                'password' => bcrypt('secret'),
                'telefono' => '6671948031',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ]);
    }
}
