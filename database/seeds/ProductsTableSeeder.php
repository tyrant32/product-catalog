<?php
declare(strict_types=1);

use Illuminate\Database\Seeder;
use App\Product;
use App\User;

/**
 * Class ProductsTableSeeder
 */
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 50)->create();
    }
}
