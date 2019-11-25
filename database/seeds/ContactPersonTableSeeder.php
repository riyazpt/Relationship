<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class ContactPersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_person')->insert([
                    'first_name' => 'riyaz',
                    'last_name' => Str::random(10),
                    'company_id' => 1,
                    'address_id' => 1,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                 ]);
          
    }
}
