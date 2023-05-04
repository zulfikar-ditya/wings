<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            'name',
            'price',
            'currency',
            'discount',
            'dimension',
            'unit',
            'image',
        ];

        $names = [
            'Laptop',
            'Phone',
            "bike",
            "soft case",
            "hard case",
            "bag",
            "shoes",
        ];

        foreach ($names as $key => $name) {
            Product::create([
                'name' => $name,
                'price' => collect([12000, 10000, 15000, 20000])->random(1)[0],
                'currency' => collect(['USD', 'EUR', 'IDR'])->random(1)[0],
                'discount' => collect([10, 25, 5, 2, 15])->random(1)[0],
                'dimension' => collect(['10x10x10', '20x20x20', '30x30x30'])->random(1)[0],
                'unit' => collect(['pcs', 'box', 'kg'])->random(1)[0],
                'image' => 'https://picsum.photos/600/600?random=' . $key,
            ]);
        }
    }
}
