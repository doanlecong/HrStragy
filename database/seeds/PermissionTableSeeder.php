<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'job-list',
            'job-create',
            'job-edit',
            'job-delete',
            'joblevel-list',
            'joblevel-create',
            'joblevel-edit',
            'joblevel-delete',
            'jobtype-list',
            'jobtype-create',
            'jobtype-edit',
            'jobtype-delete',
            'cate-list',
            'cate-create',
            'cate-edit',
            'cate-delete',
            'story-list',
            'story-create',
            'story-edit',
            'story-delete',
            'comment-list',
            'comment-create',
            'comment-edit',
            'comment-delete',
            'country-list',
            'country-create',
            'country-edit',
            'country-delete',
            'province-list',
            'province-create',
            'province-edit',
            'province-delete',
            'district-list',
            'district-create',
            'district-edit',
            'district-delete',
            'company-list',
            'company-create',
            'company-edit',
            'company-delete',
            'candidate-list',
            'candidate-create',
            'candidate-edit',
            'candidate-delete',
            'mailsub-list',
            'mailsub-create',
            'mailsub-edit',
            'mailsub-delete',
            'banner-list',
            'banner-create',
            'banner-edit',
            'banner-delete',
            'nav-list',
            'nav-create',
            'nav-edit',
            'nav-delete',
            'contact-list',
            'contact-create',
            'contact-edit',
            'contact-delete',
            'advertise-list',
            'advertise-create',
            'advertise-edit',
            'advertise-delete',
            'service-list',
            'service-create',
            'service-edit',
            'service-delete',

        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
