<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CompetencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$data = [
			[
				'id' => 1,
				'name' => 'Database',
				'description' => '',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
			[
				'id' => 2,
				'name' => 'Container',
				'description' => '',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
			[
				'id' => 3,
				'name' => 'Programming',
				'description' => '',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
			[
				'id' => 4,
				'name' => 'APM',
				'description' => '',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
			[
				'id' => 5,
				'name' => 'Analytic',
				'description' => '',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
			[
				'id' => 6,
				'name' => 'Consulting',
				'description' => '',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
		];
		DB::table('competencies')->insert($data);
    }
}
