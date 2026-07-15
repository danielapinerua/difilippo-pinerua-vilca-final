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
            'name' => 'Pan hamburguesa Schär',
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
            'name' => 'Galletitas Smams chocolate',
            'description' => 'Galletitas de chocolate marca Smams libres de gluten de 200 gramos.',
            'price' => 2500,
            'stock' => 10,
            'image' => 'products/smamschoco.webp'
            ]);
        
        Product::create([
            'name' => 'Snack Aritos de arroz crema y cebolla',
            'description' => 'Snacks aritos de arroz sabor crema con cebolla marca Dos Hermanos de 80 gramos.',
            'price' => 1800,
            'stock' => 10,
            'image' => 'products/snackaritos.webp'
            ]);

        Product::create([
            'name' => 'Chips de pizza Gallo',
            'description' => 'Chips de pizza marca Gallo libres de gluten de 100 gramos.',
            'price' => 2000,
            'stock' => 10,
            'image' => 'products/gallopizza.webp'
        ]);

        Product::create([
            'name' => 'Pepas Kapac',
            'description' => 'Galletitas pepas marca Kapac libres de gluten de 200 gramos.',
            'price' => 2500,
            'stock' => 10,
            'image' => 'products/pepaskapac.webp'
            ]);

        Product::create([
            'name' => 'Alfajor Matilda',
            'description' => 'Alfajor Matilda sin gluten marca Maixanas de 80 gramos.',
            'price' => 2000,
            'stock' => 10,
            'image' => 'products/alfajormatilda.webp'
            ]);

        Product::create([
            'name' => 'Tapas para empanadas La Sálteña sin gluten',
            'description' => 'Tapas para empanadas sin gluten marca La Sálteña de 330 gramos, 12 unidades.',
            'price' => 3000,
            'stock' => 10,
            'image' => 'products/tapaslasaltena.webp'
            ]);

        Product::create([
            'name' => 'Bizcochuelo de vainilla Exquisita sin gluten',
            'description' => 'Bizcochuelo de vainilla libre de gluten marca Exquisita de 450 gramos.',
            'price' => 3000,
            'stock' => 10,
            'image' => 'products/bizcochuelo.webp'
            ]);

        Product::create([
            'name' => 'Alfajor Jorgito sin gluten',
            'description' => 'Alfajor marca Jorgito sin gluten de 50 gramos.',
            'price' => 1500,
            'stock' => 10,
            'image' => 'products/jorgito.webp'
            ]);

        Product::create([
            'name' => 'Ravioles de espinaca y ricota Leofanti sin gluten',
            'description' => 'Ravioles de espinaca y ricota sin gluten marca Leofanti de 360 gramos.',
            'price' => 4000,
            'stock' => 10,
            'image' => 'products/ravioles.webp'
            ]);

        Product::create([
            'name' => 'Galletitas marmoladas Santa María sin gluten',
            'description' => 'Galletitas marmoladas sin gluten marca Santa María de 200 gramos.',
            'price' => 2500,
            'stock' => 10,
            'image' => 'products/marmoladas.webp'
            ]);

        Product::create([
            'name' => 'Budín Smams con chips de chocolate sin gluten',
            'description' => 'Budín sin gluten con chips de chocolate marca Smams de 200 gramos.',
            'price' => 2500,
            'stock' => 10,
            'image' => 'products/budinchips.webp'
            ]);
    }
}