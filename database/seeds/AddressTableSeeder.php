<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('addresses')->insert([
                'address' => Str::random(10),
                'created_at' => date("Y-m-d H:i:s"),
                 'updated_at' => date("Y-m-d H:i:s")
                ]);
    }
}
