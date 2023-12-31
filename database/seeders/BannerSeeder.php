<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Banner::insert([
            [
                'album_id' => 1,
                'image_path' => \URL::to('/').'/theme/images/banners/image1.jpg',
                'title' => 'Learning Excellence',
                'description' => 'Education is a commitment to excellence in Teaching and Learning',
                'alt' => 'Banner 1',
                'url' => \URL::to('/'),
                'order' => 1,
                'user_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'album_id' => 1,
                'image_path' => \URL::to('/').'/theme/images/banners/image2.jpg',
                'title' => null,
                'description' => null,
                'alt' => null,
                'url' => null,
                'order' => 2,
                'user_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'album_id' => 1,
                'image_path' => \URL::to('/').'/theme/images/banners/image3.jpg',
                'title' => null,
                'description' => null,
                'alt' => null,
                'url' => null,
                'order' => 2,
                'user_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
