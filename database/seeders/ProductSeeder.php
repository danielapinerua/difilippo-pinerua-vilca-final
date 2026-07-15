<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Fideos Matarazzo sin gluten tirabuzón',
            'description' => 'Fideos Matarazzo sin gluten de 500 gramos tipo tirabuzón.',
            'price' => 2500,
            'stock' => 20,
            'image' => 'products/fideosmatarazzo.webp'
        ]);

        Product::create([
            'name' => 'Oreo sin gluten',
            'description' => 'Galletitas Oreo sin gluten de 95 gramos.',
            'price' => 1800,
            'stock' => 15,
            'image' => 'products/oreossingluten.webp'
        ]);

        Product::create([
            'name' => 'Pan hamburguesa Schär sin gluten',
            'description' => 'Pan para hamburguesa Schär sin gluten de 130 gramos.',
            'price' => 3000,
            'stock' => 10,
            'image' => 'products/panhamburguesa.webp'
        ]);

        Product::create([
            'name' => 'Premezcla Santa María sin lactosa',
            'description' => 'Premezcla para panadería y repostería Santa María sin lactosa de 1 kg.',
            'price' => 4500,
            'stock' => 10,
            'image' => 'products/premezclasinlactosa.webp'
            ]);
        
        Product::create([
            'name' => 'Premezcla Pureza sin gluten',
            'description' => 'Premezcla Pureza para pizza y pan libre de gluten de 500 gramos.',
            'price' => 2500,
            'stock' => 10,
            'image' => 'products/pureza.webp'
            ]);
        
        Product::create([
            'name' => 'Premezcla Pureza para chipa sin gluten',
            'description' => 'Premezcla Pureza para preparar chipa libre de gluten de 250 gramos.',
            'price' => 2000,
            'stock' => 10,
            'image' => 'products/purezachipa.webp'
            ]);

        Product::create([
            'name' => 'Galletitas Smams chocolate sin gluten',
            'description' => 'Galletitas de chocolate marca Smams libres de gluten de 200 gramos.',
            'price' => 2500,
            'stock' => 10,
            'image' => 'products/smamschoco.webp'
            ]);
    }
}