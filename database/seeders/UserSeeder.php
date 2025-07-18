<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'phone' => '081234567890',
            'address' => 'Jl. Admin No. 1, Jakarta',
            'role' => 'admin'
        ]);

        // Librarian User
        User::create([
            'name' => 'Librarian User',
            'email' => 'librarian@example.com',
            'password' => Hash::make('librarian123'),
            'phone' => '081234567891',
            'address' => 'Jl. Pustakawan No. 2, Jakarta',
            'role' => 'librarian'
        ]);

        // Member User
        User::create([
            'name' => 'Member User',
            'email' => 'member@example.com',
            'password' => Hash::make('member123'),
            'phone' => '081234567892',
            'address' => 'Jl. Anggota No. 3, Jakarta',
            'role' => 'member'
        ]);
        
        // Additional Members
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => Hash::make('budi123'),
            'phone' => '081234567893',
            'address' => 'Jl. Mawar No. 10, Surabaya',
            'role' => 'member'
        ]);
        
        User::create([
            'name' => 'Siti Rahma',
            'email' => 'siti@example.com',
            'password' => Hash::make('siti123'),
            'phone' => '081234567894',
            'address' => 'Jl. Melati No. 15, Bandung',
            'role' => 'member'
        ]);
    }
}