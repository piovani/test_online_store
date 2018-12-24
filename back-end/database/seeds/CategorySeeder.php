<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'man',
            'woman',
            'outhers',
        ];

        foreach ($data as $item) {
            factory(\App\Domain\Category\Category::class)->create([
                'description' => $item,
            ]);
        }
    }
}
