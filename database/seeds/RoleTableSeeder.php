<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $roles = [
            // danh sach cac role
            'Administrator',

            'Job-Company-Category-Location-Manager',

            'Story-Service-Manager',

            'Candidates-Guest-Contact-Manager',

            'Contact-Mail-Subscriber-Manager',

            'Cooperate-Company-Info-Manager'
        ];
        foreach ($roles as $role){
            Role::create(['name' => $role]);
        }
    }
}