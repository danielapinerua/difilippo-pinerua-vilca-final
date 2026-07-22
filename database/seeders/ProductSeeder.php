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
            'stock' => 50,
            'image' => 'products/premezclasinlactosa.webp'
            ]);
        
        Product::create([
            'name' => 'Premezcla Pureza sin gluten',
            'description' => 'Premezcla Pureza para pizza y pan libre de gluten de 500 gramos.',
            'price' => 2500,
            'stock' => 50,
            'image' => 'products/pureza.webp'
            ]);
        
        Product::create([
            'name' => 'Premezcla Pureza para chipa sin gluten',
            'description' => 'Premezcla Pureza para preparar chipa libre de gluten de 250 gramos.',
            'price' => 2000,
            'stock' => 20,
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
            'stock' => 40,
            'image' => 'products/tapaslasaltena.webp'
            ]);

        Product::create([
            'name' => 'Bizcochuelo de vainilla Exquisita sin gluten',
            'description' => 'Bizcochuelo de vainilla libre de gluten marca Exquisita de 450 gramos.',
            'price' => 3000,
            'stock' => 30,
            'image' => 'products/bizcochuelo.webp'
            ]);

        Product::create([
            'name' => 'Alfajor Jorgito sin gluten',
            'description' => 'Alfajor marca Jorgito sin gluten de 50 gramos.',
            'price' => 1500,
            'stock' => 20,
            'image' => 'products/jorgito.webp'
            ]);

        Product::create([
            'name' => 'Ravioles de calabaza y queso Leofanti',
            'description' => 'Ravioles de calabaza y queso sin gluten marca Leofanti de 360 gramos.',
            'price' => 4000,
            'stock' => 30,
            'image' => 'products/ravioles.webp'
            ]);

        Product::create([
            'name' => 'Galletitas marmoladas Santa María',
            'description' => 'Galletitas marmoladas sin gluten marca Santa María de 200 gramos.',
            'price' => 2500,
            'stock' => 20,
            'image' => 'products/marmoladas.webp'
            ]);

        Product::create([
            'name' => 'Budín Smams con chips de chocolate',
            'description' => 'Budín sin gluten con chips de chocolate marca Smams de 200 gramos.',
            'price' => 2500,
            'stock' => 25,
            'image' => 'products/budinchips.webp'
            ]);

        Product::create([
            'name' => 'Empanadas de carne Il Sole',
            'description' => 'Empanadas de carne congeladas libres de gluten marca Il Sole de 480 gramos.',
            'price' => 5000,
            'stock' => 10,
            'image' => 'products/empanadas.webp'
            ]);

        Product::create([
            'name' => 'Medallones de soja Dimax',
            'description' => 'Medallones de soja marca Dimax de 4 unidades.',
            'price' => 3500,
            'stock' => 15,
            'image' => 'products/medallonesdesoja.webp'
            ]);

        Product::create([
            'name' => 'Pizza de muzzarella Il Sole',
            'description' => 'Pizza de muzzarella sin gluten congelada marca Il Sole de 400 gramos.',
            'price' => 5000,
            'stock' => 10,
            'image' => 'products/pizza.webp'
            ]);

        Product::create([
            'name' => 'Nuggets de pollo Maheso',
            'description' => 'Nuggets de pollo sin gluten marca Maheso de 300 gramos.',
            'price' => 4000,
            'stock' => 10,
            'image' => 'products/nuggets.webp'
            ]);

        Product::create([
            'name' => 'Premezcla para ñoquis de papa Arcor sin gluten',
            'description' => 'Premezcla para preparar ñoquis de papa libre de gluten marca Arcor de 400 gramos.',
            'price' => 2500,
            'stock' => 15,
            'image' => 'products/premezclanoquis.webp'
            ]);

        Product::create([
            'name' => 'Papas fritas Lays clásicas',
            'description' => 'Papas fritas clásicas marca Lays de 330 gramos, libres de gluten.',
            'price' => 2800,
            'stock' => 20,
            'image' => 'products/lays.webp'
            ]);

        Product::create([
            'name' => 'Snacks de batata Quento mostaza y miel',
            'description' => 'Snacks de batata sabor mostaza y miel marca Quento, libres de gluten, 70 gramos.',
            'price' => 2200,
            'stock' => 15,
            'image' => 'products/quentobatatas.webp'
            ]);

        Product::create([
            'name' => 'Pizza con jamón y provolone Glufreez',
            'description' => 'Pizza congelada sin gluten con jamón y provolone marca Glufreez de 440 gramos.',
            'price' => 5500,
            'stock' => 10,
            'image' => 'products/pizzacongelada.webp'
            ]);

        Product::create([
            'name' => 'Tapas para tarta La Salteña sin gluten',
            'description' => 'Tapas para tarta sin gluten marca La Salteña de 380 gramos.',
            'price' => 3200,
            'stock' => 25,
            'image' => 'products/tapatarta.webp'
            ]);

        Product::create([
            'name' => 'Premezcla para brownie Arcor sin gluten',
            'description' => 'Premezcla para brownie sin gluten marca Arcor de 420 gramos.',
            'price' => 2600,
            'stock' => 30,
            'image' => 'products/brownie.webp'
            ]);

        Product::create([
            'name' => 'Snacks de arroz sabor queso Dos Hermanos',
            'description' => 'Snacks de arroz horneados sabor queso sin gluten marca Dos Hermanos de 80 gramos.',
            'price' => 1500,
            'stock' => 40,
            'image' => 'products/snacksqueso.webp'
            ]);

        Product::create([
            'name' => 'Pan Rallado Preferido sin gluten',
            'description' => 'Pan rallado sin gluten marca Preferido de 350 gramos.',
            'price' => 2000,
            'stock' => 50,
            'image' => 'products/panrallado.webp'
            ]);

        Product::create([
            'name' => 'Pan con semillas Franks',
            'description' => 'Pan con semillas sin gluten marca Franks de 500 gramos.',
            'price' => 3500,
            'stock' => 50,
            'image' => 'products/panfranks.webp'
            ]);
        

    }
}