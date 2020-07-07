<?php

use Illuminate\Database\Seeder;

use App\Product;
use App\Category;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = "Food";
        $category->save();

        $product = new Product();
        $product->category_id = $category->id;
        $product->name = "Rice";
        $product->save();

        $product = new Product();
        $product->category_id = $category->id;
        $product->name = "Meat";
        $product->save();

        $product = new Product();
        $product->category_id = $category->id;
        $product->name = "Apple";
        $product->save();

        $category = new Category();
        $category->name = "Sport";
        $category->save();

        $product = new Product();
        $product->category_id = $category->id;
        $product->name = "Football";
        $product->save();

        $product = new Product();
        $product->category_id = $category->id;
        $product->name = "Cricket";
        $product->save();

  
        $category = new Category();
        $category->name = "Instruments";
        $category->save();

        $product = new Product();
        $product->category_id = $category->id;
        $product->name = "Guitar";
        $product->save();

        $product = new Product();
        $product->category_id = $category->id;
        $product->name = "Piano";
        $product->save();
    }
}
