<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AchievmentType;

class AchievmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $achievment_types = [
            [
                'title' => 'First question',
            ],

            [
                'title' => 'First comment',
            ],

            [
                'title' => 'Fifth comment',
            ],

            [
                'title' => 'Tenth comment',
            ],

            [
                'title' => '1 upvote',
            ],

            [
                'title' => '5 upvotes',
            ],

            [
                'title' => '10 upvotes',
            ],

            [
                'title' => '20 upvotes',
            ],

            [
                'title' => '100 upvotes',
            ],

            [
                'title' => 'Hundredth upvotes',
            ],

        ];


        foreach ($achievment_types as $achievment_type) {
            AchievmentType::create($achievment_type);
        }
    }
}
