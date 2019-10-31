<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DetailTableSeeder extends Seeder
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
	    		'name' => 'Installation',
	    		'competency_id' => 1,
	    		'weight' => 10,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 2,
	    		'name' => 'Administration',
	    		'competency_id' => 1,
	    		'weight' => 20,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 3,
	    		'name' => 'Clustering',
	    		'competency_id' => 1,
	    		'weight' => 30,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 4,
	    		'name' => 'DR',
	    		'competency_id' => 1,
	    		'weight' => 20,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 5,
	    		'name' => 'Replikasi',
	    		'competency_id' => 1,
	    		'weight' => 20,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 6,
	    		'name' => 'Installation',
	    		'competency_id' => 2,
	    		'weight' => 10,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 7,
	    		'name' => 'Administration',
	    		'competency_id' => 2,
	    		'weight' => 50,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 8,
	    		'name' => 'Clustering',
	    		'competency_id' => 2,
	    		'weight' => 40,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 9,
	    		'name' => 'Programming Language',
	    		'competency_id' => 3,
	    		'weight' => 30,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
	    	],
    		[
	    		'id' => 10,
	    		'name' => 'Business Process Implementation',
	    		'competency_id' => 3,
	    		'weight' => 40,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 11,
	    		'name' => 'Data Engineer',
	    		'competency_id' => 3,
	    		'weight' => 30,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 12,
	    		'name' => 'Installation',
	    		'competency_id' => 4,
	    		'weight' => 20,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 13,
	    		'name' => 'Administration',
	    		'competency_id' => 4,
	    		'weight' => 30,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 14,
	    		'name' => 'Reporting',
	    		'competency_id' => 4,
	    		'weight' => 30,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 15,
	    		'name' => 'Presenting',
	    		'competency_id' => 4,
	    		'weight' => 20,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 16,
	    		'name' => 'Data Analytic',
	    		'competency_id' => 5,
	    		'weight' => 20,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 17,
	    		'name' => 'Numeracy',
	    		'competency_id' => 5,
	    		'weight' => 20,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 18,
	    		'name' => 'Problem Solving',
	    		'competency_id' => 5,
	    		'weight' => 40,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 19,
	    		'name' => 'Research',
	    		'competency_id' => 5,
	    		'weight' => 20,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 20,
	    		'name' => 'Presenting',
	    		'competency_id' => 6,
	    		'weight' => 25,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 21,
	    		'name' => 'Solution Driven',
	    		'competency_id' => 6,
	    		'weight' => 25,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
			[
	    		'id' => 22,
	    		'name' => 'Business Requirement',
	    		'competency_id' => 6,
	    		'weight' => 25,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    		[
	    		'id' => 23,
	    		'name' => 'Communication',
	    		'competency_id' => 6,
	    		'weight' => 25,
	    		'created_at' => Carbon::now(),
	    		'updated_at' => Carbon::now()
    		],
    	];
        DB::table('details')->insert($data);
    }
}
