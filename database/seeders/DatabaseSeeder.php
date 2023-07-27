<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $bondowoso_id = DB::table('users')->insertGetId([
            'name' => "Bondowoso", 
            'email' => 'Bondowoso@gmail.com',
            'password' => Hash::make('password123'),
        ]); 

        DB::table('history')->insert([
            'user_id' => $bondowoso_id, 
            'nama' => 'Melati', 
            'jumlah' => 5, 
            'total' => 40000
        ]); 

        DB::table('history')->insert([
            'user_id' => $bondowoso_id, 
            'nama' => 'Kapur', 
            'jumlah' => 5, 
            'total' => 50000
        ]); 

        DB::table('history')->insert([
            'user_id' => $bondowoso_id, 
            'nama' => 'Minyak Kelapa', 
            'jumlah' => 1, 
            'total' => 12000
        ]); 

        DB::table('history')->insert([
            'user_id' => $bondowoso_id, 
            'nama' => 'Daun Aren', 
            'jumlah' => 5, 
            'total' => 7500
        ]); 

        DB::table('history')->insert([
            'user_id' => $bondowoso_id, 
            'nama' => 'Sagu', 
            'jumlah' => 1, 
            'total' => 4999
        ]); 

        $roro_id = DB::table('users')->insertGetId([
            'name' => "Roro", 
            'email' => 'Roro@gmail.com',
            'password' => Hash::make('password123'),
        ]); 

        DB::table('history')->insert([
            'user_id' => $roro_id, 
            'nama' => 'Pinang', 
            'jumlah' => 1, 
            'total' => 10000
        ]); 

        DB::table('history')->insert([
            'user_id' => $roro_id, 
            'nama' => 'Cempaka', 
            'jumlah' => 2, 
            'total' => 18000
        ]); 

        DB::table('history')->insert([
            'user_id' => $roro_id, 
            'nama' => 'Minyak Kelapa', 
            'jumlah' => 2, 
            'total' => 24000
        ]); 
    }
}
