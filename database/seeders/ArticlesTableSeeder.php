<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;
use App\Models\Category;

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        $admin = User::where('name', 'admin')->first();
        $categories = Category::all();

        $articles = [
            [
                'title' => 'Mengapa Banyak Wibu Pintar Secara Akademik?',
                'full_text' => 'Istilah "wibu" merujuk pada individu yang memiliki minat mendalam terhadap budaya pop Jepang seperti anime dan manga. Menariknya, banyak wibu dikenal sebagai anak yang pintar secara akademik. Berikut beberapa alasan mengapa hal ini bisa terjadi Inspirasi dari Karakter Fiksi:
Anime dan manga sering menampilkan karakter yang berprestasi dan rajin belajar. Hal ini menginspirasi wibu untuk meniru etos kerja keras tersebut dalam kehidupan nyata.

Pembelajaran Mandiri:
Banyak wibu belajar bahasa Jepang agar lebih memahami karya favorit mereka. Proses ini melibatkan keterampilan penelitian dan dedikasi yang tinggi, yang juga berguna dalam bidang akademik.

Media yang Edukatif:
Anime dan manga mengandung banyak informasi tentang berbagai topik seperti sains, sejarah, dan filosofi. Konsumsi media ini memperluas wawasan dan pengetahuan wibu.

Komunitas yang Mendukung:
Komunitas wibu sering menjadi tempat diskusi dan berbagi informasi. Diskusi ini meningkatkan kemampuan berpikir kritis dan memperdalam pengetahuan mereka.

Keteraturan dan Disiplin:
Kebiasaan menonton serial anime atau membaca manga yang panjang membutuhkan disiplin dan manajemen waktu. Keterampilan ini membantu wibu dalam menjaga keteraturan dan fokus dalam studi mereka.

Dengan kombinasi inspirasi, pembelajaran mandiri, konsumsi media yang edukatif, dukungan komunitas, serta keteraturan dan disiplin, banyak wibu menunjukkan prestasi akademik yang tinggi.',
                'image' => 'https://cdn0-production-images-kly.akamaized.net/fgj-TlsEm6gP9cD-Lj-VphH6r1M=/640x853/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3341417/original/014567200_1609906180-082790000_1596802638-qu___c-b___o-2034539.jpg',
                'category_id' => $categories->random()->id,
                'user_id' => $admin->id,
            ],
            [
                'title' => 'Healthy Living Tips',
                'full_text' => 'Living a healthy life is essential...',
                'image' => 'https://example.com/images/health.jpg',
                'category_id' => $categories->random()->id,
                'user_id' => $admin->id,
            ],
            [
                'title' => 'Space Exploration Advancements',
                'full_text' => 'The new era of space exploration is here...',
                'image' => 'https://example.com/images/space.jpg',
                'category_id' => $categories->random()->id,
                'user_id' => $admin->id,
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
