<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            ['name' => 'Perwibuan'],
            ['name' => 'Perkipopan'],
            ['name' => 'Perjametan'],
            ['name' => 'Perjomsan'],
            ['name' => 'Persigmaan'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
