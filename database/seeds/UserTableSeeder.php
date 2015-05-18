<?php

use illuminate\Database\Seeder;
use illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->truncate();

		$faker = Faker::create();

		User::create([
			'name' => 'Luis Carlos Quinhone',
			'email' => 'lcquinhone@gmail.com',
			'password' => Hash::make(123456)
		]);

		foreach (range(1,10) as $i) {
			User::create([
				'name' => $faker->name(),
				'email' => $faker->email(),
				'password' => Hash::make($faker->word())
			]);
		}
	}
}