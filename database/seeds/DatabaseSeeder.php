<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(config('database.default') !== 'sqlite'){
			DB::statement('Set Foreign_key_checks=0');
		}
		
		App\User::truncate();
		$this->call(usertableseeder::class);

		App\article::truncate();
		$this->call(articlestableseeder::class);

		if(config('database.default') !=='sqlite'){
			DB::statement('Set Foreign_key_checks=1');
		}
    }
}
