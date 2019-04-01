<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();
        $editorRole = Role::where('name', 'editor')->first();
        $authorRole = Role::where('name', 'author')->first();

        User::truncate();

        $admin = User::create([ 
        	'name' => 'Alex',
        	'email' => 'avance@bulldogcreative.com',
        	'password' => bcrypt('password')
        ]);

        $editor= User::create([
        	'name' => 'Levi',
        	'email' => 'ldurfee@bulldogcreative.com',
        	'password' => bcrypt('password')
        ]);

        $author= User::create([
        	'name' => 'Tom',
        	'email' => 'tom@bulldogcreative.com',
        	'password' => bcrypt('password')
        ]);

        $admin->roles()->attach($adminRole);
        $editor->roles()->attach($editorRole);
        $author->roles()->attach($authorRole);
    }
}
