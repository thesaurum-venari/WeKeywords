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
			'username'	=> 'superuser',
			'password'	=> Hash::make('superuser'),
			'email'		=> 'superuser@sudo.net',
			'role'		=> 'su'
		]);

		User::create([
			'username'	=> 'editor',
			'password'	=> Hash::make('editor'),
			'email'		=> 'editor@sudo.net',
			'role'		=> 'editor'
		]);
	}
}