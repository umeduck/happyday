<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('memories')->insert([
        'title' => 'タイトル',
        'text' => 'テキスト',
        'img_path' => '/images/bald_eagle.JPG',
        'user_id' => 1,
        'date_id' => 2,
        'created_at' => '2023-12-01 22:17:10',
        'updated_at' => '2023-12-01 22:17:10'
    ]);
  }
}