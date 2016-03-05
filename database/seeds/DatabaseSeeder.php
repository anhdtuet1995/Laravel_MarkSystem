<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
    	DB::table('years')->insert([
    		'year_title' => '2014'
    	]);

    	DB::table('years')->insert([
    		'year_title' => '2015'
    	]);

    	DB::table('semesters')->insert([
    		'semester_title' => 'Học kỳ một',
        'year_id' => 1
    	]);

    	DB::table('semesters')->insert([
    		'semester_title' => 'Học kỳ hai',
        'year_id' => 2
    	]);

      DB::table('subjects')->insert([
        'subject_title' => 'Lập trình hướng đối tượng',
        'semester_id' => '1',
      ]);

      DB::table('subjects')->insert([
        'subject_title' => 'Lập trình nâng cao',
        'semester_id' => '1',
      ]);

      DB::table('subjects')->insert([
        'subject_title' => 'Lập trình hệ thống nhúng',
        'semester_id' => '1',
      ]);      
    }
}
