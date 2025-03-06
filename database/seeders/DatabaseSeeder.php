<?php
 namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
public function run(): void
{
DB::table('users')->insert([
'name' => 'tawba',
'email' => 'tawba@gmail.com',
'email_verified_at' => now(), 
'password' => bcrypt('password'),
'remember_token' => Str::random(10),
'created_at' => now(),
'updated_at' => now(),
]);
}
}