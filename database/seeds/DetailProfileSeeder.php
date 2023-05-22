<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProfileSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('detail_profile')->insert([
			'address' => 'Sidoarjo',
			'nomor_tlp' => '08xxxxxxxxxx',
			'ttl' => '2003-03-22',
			'foto' => 'image.jpg'
		]);
	}
}
