<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = [];
        for($i=1;$i<5;$i++){
            $test[] = [
                'name'=>"Nguyễn Trung Son",
                'gender'=>"1",
                "phone"=>"0944037".$i."82",
                'address'=>"Gia minh gia vieexn",
                'image'=>""
            ];
        }
        DB::table('student')->insert($test);
    }
}
