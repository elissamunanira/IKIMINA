<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'users-list',
            'users-create',
            'users-edit',
            'users-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'loan-request',
            'loan-approval',
            'membership-approval',
            'savings-recording',
            'penalities-recording',
            'budget-record',
            'budget-approval',
            'expenses',
            'mituelle-recording',

         ];
         
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
     }
 }