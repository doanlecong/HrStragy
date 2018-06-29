<?php
use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::create([
            'name' => 'Doan Le',
            'email' => 'doanlecong1811@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('doan2504929')
        ]);
    }
}