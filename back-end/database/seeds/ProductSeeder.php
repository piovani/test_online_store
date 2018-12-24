<?php

use Illuminate\Database\Seeder;
use App\Domain\Product\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = \App\Domain\Category\Category::all();

        $names = [
            'Silver',
            'Black',
            'Gold',
        ];

        $imagens = [
            'https://d2d7stu5fcdz3l.cloudfront.net/Custom/Content/Products/10/54/1054980_relogio-phillip-kollin-bali-mixed-rose-white_z2_636500547748319538.jpg',
            'https://images.tcdn.com.br/img/img_prod/640066/relogio_mormaii_ref_mo2036im_8p_5277_1_20181015164746.jpg',
            'https://images.tcdn.com.br/img/img_prod/640066/relogio_condor_ref_co2317aa_4a_5229_1_20181015170409.jpg'
        ];

        for ($y = 0; $y < 3; $y++) {
            foreach ($categories as $category) {
                for ($i = 0; $i < 3; $i++) {
                    factory(Product::class)->create([
                        'name' => $names[$i],
                        'image1' => $imagens[$i],
                        'image2' => $imagens[$i],
                        'image3' => $imagens[$i],
                        'image4' => $imagens[$i],
                        'category_id' => $category->id,
                    ]);
                }
            }
        }
    }
}
