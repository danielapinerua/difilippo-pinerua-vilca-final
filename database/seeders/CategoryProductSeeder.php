<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class CategoryProductSeeder extends Seeder
{
    public function run(): void
    {
        $snacks = Category::where('name', 'Snacks')->first();
        $dulces = Category::where('name', 'Dulces')->first();
        $salados = Category::where('name', 'Salados')->first();
        $harinas = Category::where('name', 'Harinas')->first();
        $congelados = Category::where('name', 'Congelados')->first();


        // SNACKS
        $snacksProductos = [
            'Snack Aritos de arroz crema y cebolla',
            'Chips de pizza Gallo',
            'Papas fritas Lays clásicas',
            'Snacks de batata Quento mostaza y miel',
            'Snacks de arroz sabor queso Dos Hermanos'
        ];

        foreach ($snacksProductos as $producto) {
            Product::where('name', $producto)
                ->first()
                ->categories()
                ->attach($snacks->id);
        }

        // DULCES

        $dulcesProductos = [
            'Oreo sin gluten',
            'Galletitas Smams chocolate',
            'Pepas Kapac',
            'Alfajor Matilda',
            'Alfajor Jorgito sin gluten',
            'Galletitas marmoladas Santa María',
            'Budín Smams con chips de chocolate'
        ];

        foreach ($dulcesProductos as $producto) {
            Product::where('name', $producto)
                ->first()
                ->categories()
                ->attach($dulces->id);
        }


        // HARINAS

        $harinasProductos = [
            'Premezcla Santa María sin lactosa',
            'Bizcochuelo de vainilla Exquisita sin gluten',
            'Premezcla Pureza sin gluten',
            'Premezcla Pureza para chipa sin gluten',
            'Premezcla para ñoquis de papa Arcor sin gluten',
            'Premezcla para brownie Arcor sin gluten'
        ];

        foreach ($harinasProductos as $producto) {
            Product::where('name', $producto)
                ->first()
                ->categories()
                ->attach($harinas->id);
        }


        // SALADOS

        $saladosProductos = [
            'Pan hamburguesa Schär',
            'Tapas para empanadas La Sálteña sin gluten',
            'Fideos Matarazzo sin gluten tirabuzón',
            'Tapas para tarta La Salteña sin gluten',
            'Pan Rallado Preferido sin gluten',
            'Pan con semillas Franks'
        ];

        foreach ($saladosProductos as $producto) {
            Product::where('name', $producto)
                ->first()
                ->categories()
                ->attach($salados->id);
        }


        // CONGELADOS

        $congeladosProductos = [
            'Ravioles de calabaza y queso Leofanti',
            'Empanadas de carne Il Sole',
            'Pizza de muzzarella Il Sole',
            'Medallones de soja Dimax',
            'Nuggets de pollo Maheso',
            'Pizza con jamón y provolone Glufreez'
        ];

        foreach ($congeladosProductos as $producto) {
            Product::where('name', $producto)
                ->first()
                ->categories()
                ->attach($congelados->id);
        }
    }
}