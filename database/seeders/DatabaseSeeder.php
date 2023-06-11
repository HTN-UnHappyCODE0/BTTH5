<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use App\Models\Author;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Số lượng bản ghi bạn muốn tạo
        $numberOfRecords = 10;

        // Khởi tạo Faker
        $faker = Faker::create();

        // Gieo dữ liệu cho bảng 'theloai'
        for ($i = 1; $i <= $numberOfRecords; $i++) {
            Category::create([
                'ma_tloai' => $i,
                'ten_tloai' => $faker->word
            ]);
        }

        // Gieo dữ liệu cho bảng 'tacgia'
        for ($i = 1; $i <= $numberOfRecords; $i++) {
            Author::create([
                'ma_tgia' => $i,
                'ten_tgia' => $faker->name,
                'hinh_tgia' => $faker->imageUrl()
            ]);
        }

        // Gieo dữ liệu cho bảng 'baiviet'
        for ($i = 1; $i <= $numberOfRecords; $i++) {
            Article::create([
                'ma_bviet' => $i,
                'tieude' => $faker->sentence,
                'ten_bhat' => $faker->name,
                'ma_tloai' => $faker->numberBetween(1, $numberOfRecords),
                'tomtat' => $faker->paragraph,
                'noidung' => $faker->paragraph,
                'ma_tgia' => $faker->numberBetween(1, $numberOfRecords),
                'ngayviet' => $faker->dateTime,
                'hinhanh' => $faker->imageUrl()
            ]);
        }
    }
}
