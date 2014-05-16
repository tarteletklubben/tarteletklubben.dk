<?php

class RoleTableSeeder extends Seeder {
	public function run()
	{
		DB::table('roles')->delete();

		Role::create(array(
			'name' => 'Administrator'
		));

		Role::create(array(
			'name' => 'Formand'
		));

		Role::create(array(
			'name' => 'Næstformand'
		));

		Role::create(array(
			'name' => 'Kasserer'
		));

		Role::create(array(
			'name' => 'Medlem'
		));
	}
}
