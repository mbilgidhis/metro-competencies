<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
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
    				'name' => 'Andi Baskoro',
    		        'email' => 'baskoro.ruliawan@gmail.com',
    		        'email_verified_at' => Carbon::now(),
    		        'password' => bcrypt('iosaphat007'),
    		        'created_at' => Carbon::now(),
    		        'updated_at' => Carbon::now(),
    			]
    	];
        DB::table('users')->insert($data);
    }
}
