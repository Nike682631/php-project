<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'company_id' => 1,
            'author_id' => 8,
            'rating' => 4,
            'description' => 'test demo1',
            'approved' => true
        ]);

        DB::table('reviews')->insert([
            'company_id' => 8,
            'author_id' => 1,
            'rating' => 5,
            'description' => 'test demo2',
            'approved' => true
        ]);

        DB::table('reviews')->insert([
            'company_id' => 21,
            'author_id' => 8,
            'rating' => 3,
            'description' => 'test demo3',
            'approved' => true
        ]);
    }
}
