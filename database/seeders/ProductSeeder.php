<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Product;
use App\Models\Typology;

class ProductSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Product::factory()->count(100)->make()->each(function ($p) {

      // FK
      $typology = Typology::inRandomOrder()->first();
      $p->typology()->associate($typology);

      $p->save();

      // NaM
      $categories = Category::inRandomOrder()->limit(rand(1, 5))->get();
      $p->categories()->attach($categories);
    });
  }
}
