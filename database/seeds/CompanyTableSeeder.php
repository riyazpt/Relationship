<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('companies')->insert([
                    'company_name' => Str::random(10),
                    'company_address' => Str::random(10),
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                 ]);
          
    }
}
