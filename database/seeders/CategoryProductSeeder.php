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

        Product::where('name', 'Snack Aritos de arroz crema y cebolla')
            ->first()
            ->categories()
            ->attach($snacks->id);

        Product::where('name', 'Chips de pizza Gallo')
            ->first()
            ->categories()
            ->attach($snacks->id);


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
            'Premezcla para ñoquis de papa Arcor sin gluten'
        ];

        foreach ($harinasProductos as $producto) {
            Product::where('name', $producto)
                ->first()
                ->categories()
                ->attach($harinas->id);
        }


        // SALADOS

        $saladosProductos = [
            'Tapas para empanadas La Sálteña sin gluten',
            'Ravioles de espinaca y ricota Leofanti', 
            'Fideos Matarazzo sin gluten tirabuzón'
        ];

        foreach ($saladosProductos as $producto) {
            Product::where('name', $producto)
                ->first()
                ->categories()
                ->attach($salados->id);
        }


        // CONGELADOS

        $congeladosProductos = [
            'Empanadas de carne Il Sole',
            'Pizza de muzzarella Il Sole',
            'Medallones de soja Dimax',
            'Nuggets de pollo Argenti'
        ];

        foreach ($congeladosProductos as $producto) {
            Product::where('name', $producto)
                ->first()
                ->categories()
                ->attach($congelados->id);
        }
    }
}