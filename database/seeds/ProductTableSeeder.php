<?php

use illuminate\Database\Seeder;
use illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('products')->truncate();

		$faker = Faker::create();

		foreach (range(1,40) as $i) {
			Product::create([
				'name' => $faker->word(),
				'description' => $faker->sentence(),
				'price' => $faker->randomNumber(2),
				'featured' => '0',
				'recommend' => '1',
				'category_id' => $faker->numberBetween(1, 15)
			]);
		}
	}
}