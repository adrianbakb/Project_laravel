<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.pl',
            'phone' => '555888555',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@admin.pl'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
