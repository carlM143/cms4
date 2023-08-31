<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Article::insert([
            [
                'name' => 'TREE PLANTING ACTIVITY WITH THE UNITED METHODIST CHURCH',
                'slug' => $this->convert_to_slug('TREE PLANTING ACTIVITY WITH THE UNITED METHODIST CHURCH'),
                'contents' => 'PHSFI Conducted a Tree Planting Activity in partnership with The United Methodist Church Mission Farm at Purok 3, Crossing Pinyahan, San Andres, Bunawan, Agusan del Sur last Nov 23, 2022.',
                'teaser' => 'PHSFI Conducted a Tree Planting Activity in partnership with The United Methodist Church Mission Farm at Purok 3, Crossing Pinyahan, San Andres, Bunawan, Agusan del Sur last Nov 23, 2022.',
                'status' => 'Published',
                'is_featured' => '1',
                'user_id' => '1',
                'image_url' => \URL::to('/').'/theme/images/news/1.jpg',
                'thumbnail_url' => \URL::to('/').'/theme/images/news/1.jpg',
                'meta_title' => 'title',
                'meta_keyword' => 'keyword',
                'meta_description' => 'description',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'PHSFI 12TH FOUNDING ANNIVERSARY AWARDING CEREMONY & PAAST NIGHT',
                'slug' => $this->convert_to_slug('PHSFI 12TH FOUNDING ANNIVERSARY AWARDING CEREMONY & PAAST NIGHT'),
                'contents' => 'PHSFI conducted an awarding ceremony on the evening of Nov 4, 2022 to formally recognized the winners on the different activities done as part of the celebration of 18th Founding Anniversary.',
                'teaser' => 'PHSFI conducted an awarding ceremony on the evening of Nov 4, 2022 to formally recognized the winners on the different activities done as part of the celebration of 18th Founding Anniversary.',
                'status' => 'Published',
                'is_featured' => '1',
                'user_id' => '1',
                'image_url' => \URL::to('/').'/theme/images/news/3.jpg',
                'thumbnail_url' => \URL::to('/').'/theme/images/news/3.jpg',
                'meta_title' => 'title',
                'meta_keyword' => 'keyword',
                'meta_description' => 'description',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'TEACHERS AND STAFF DAY CELEBRATION 2022',
                'slug' => $this->convert_to_slug('TEACHERS AND STAFF DAY CELEBRATION 2022'),
                'contents' => 'Mga Tala ng Karagatan Sa isang karagatang malawak at malalim, Patuloy kang naglayag sa liwanag at dilim, Sa bawat hampas ng alon, ikay namimitig, Maging pagod ay di na mabulalas ng bibig.',
                'teaser' => 'Mga Tala ng Karagatan Sa isang karagatang malawak at malalim, Patuloy kang naglayag sa liwanag at dilim, Sa bawat hampas ng alon, ikay namimitig, Maging pagod ay di na mabulalas ng bibig.',
                'status' => 'Published',
                'is_featured' => '1',
                'user_id' => '1',
                'image_url' => \URL::to('/').'/theme/images/news/1a.jpg',
                'thumbnail_url' => \URL::to('/').'/theme/images/news/1a.jpg',
                'meta_title' => 'title',
                'meta_keyword' => 'keyword',
                'meta_description' => 'description',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }

    public function convert_to_slug($url){

        $url = Str::slug($url, '-');

        if (\App\Models\Page::where('slug', '=', $url)->exists()) {
            $url = $url."_2";
        }
        elseif (\App\Models\Article::where('slug', '=', $url)->exists()) {
            $url = $url."_2";
        }

        return $url;
    }
}
