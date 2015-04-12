<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use WeKeywords\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->delete();

		User::create([
			'name'		=> 'Super User',
			'password'	=> Hash::make('superuser'),
			'email'		=> 'superuser@sudo.net',
			'role'		=> 'su'
		]);

		User::create([
			'name'		=> 'Normal Editor',
			'password'	=> bcrypt('editor'),
			'email'		=> 'editor@sudo.net',
			'role'		=> 'editor'
		]);
	}
}