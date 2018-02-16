<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('tags')->insert([
            [
                'name' => 'php',
            ],
            [
                'name' => 'mysql',
            ],
            [
                'name' => 'laravel',
            ],
            [
                'name' => 'angular',
            ],
            [
                'name' => 'js',
            ],
            [
                'name' => 'html',
            ],
            [
                'name' => 'css',
            ],
            [
                'name' => 'jQuery',
            ],
            [
                'name' => 'bootstrap',
            ],
        ]);
    }
}
