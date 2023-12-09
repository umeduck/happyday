<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TargetDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('target_dates')->insert([
        [
          'title' => 'テスト誕生日',
          'target_date' => '2021-07-07',
          'target_date_type' => 1,
          'user_id' => 1,
          'created_at' => '2023-12-01 22:17:10',
          'updated_at' => '2023-12-01 22:17:10'
        ],
        [
          'title' => 'テスト誕生日',
          'target_date' => '2000-01-03',
          'target_date_type' => 1,
          'user_id' => 1,
          'created_at' => '2023-12-02 22:17:10',
          'updated_at' => '2023-12-02 22:17:10'
        ],
        [
          'title' => 'テスト誕生日',
          'target_date' => '2001-04-16',
          'target_date_type' => 1,
          'user_id' => 1,
          'created_at' => '2023-12-03 22:17:10',
          'updated_at' => '2023-12-03 22:17:10'
        ],
        [
          'title' => 'テスト誕生日',
          'target_date' => '2000-06-18',
          'target_date_type' => 1,
          'user_id' => 1,
          'created_at' => '2023-12-04 22:17:10',
          'updated_at' => '2023-12-04 22:17:10'
        ],
        [
          'title' => 'テスト誕生日',
          'target_date' => '2000-08-08',
          'target_date_type' => 1,
          'user_id' => 1,
          'created_at' => '2023-12-05 22:17:10',
          'updated_at' => '2023-12-05 22:17:10'
        ],
        [
          'title' => 'テスト記念日',
          'target_date' => '2013-04-05',
          'target_date_type' => 2,
          'user_id' => 1,
          'created_at' => '2023-06-05 22:17:10',
          'updated_at' => '2023-06-05 22:17:10'
        ]
      ]);
    }
}
