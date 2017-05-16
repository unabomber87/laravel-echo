<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        for ($i=1; $i <= 9; $i++) { 
        	DB::table('groups')->insert([
        		'name' => "Group ".$i 
        	]);
        	for($j=1; $j <= 9; $j++){
        		DB::table('users')->insert([
        			'name' => "user{$j} on groupe {$i}",
        			'email' => "user{$j}ongroupe{$i}@local.dev",
        			'password' => bcrypt('secret'),
        			'group_id' => $i
        		]);
        	}
        }
    }
}
