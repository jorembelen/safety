<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Employee;
use App\Models\Location;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jorem Belen',
            'username' => 'jorem.belen',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'Jim Jr. Rallos',
            'username' => 'jim.rallos',
            'email' => 'jim@rallos.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'Safety User',
            'username' => 'safety.user',
            'email' => 'safery@user.com',
            'role' => 'user',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'HSE Manager',
            'username' => 'hse.manager',
            'email' => 'hse@manager.com',
            'role' => 'manager',
            'password' => bcrypt('password'),
        ]);

        // Employee::create([
        //     'badge' => '1234567',
        //     'name' => 'Peter Parker',
        //     'designation' => 'Safety',
        // ]);

        // Employee::create([
        //     'badge' => '1234568',
        //     'name' => 'Allen Iverson',
        //     'designation' => 'Supervisor',
        // ]);
        
        // Employee::create([
        //     'badge' => '1234569',
        //     'name' => 'John Doe',
        //     'designation' => 'Manager',
        // ]);

        // Employee::create([
        //     'badge' => '1234570',
        //     'name' => 'Jane Doe',
        //     'designation' => 'Nurse',
        // ]);

        Location::create([
            'division' => 'RCL-CD',
            'name' => 'Sadara 1',
            'loc_name' => 'Sadara',
            'unit_code' => '1234',
        ]);

        Location::create([
            'division' => 'RCL-CD',
            'name' => 'C34 Maint',
            'loc_name' => 'C34',
            'unit_code' => '1235',
        ]);
        
        Location::create([
            'division' => 'RCL-MD',
            'name' => 'John Hopkins',
            'loc_name' => 'Abqaiq',
            'unit_code' => '1236',
        ]);
        Location::create([
            'division' => 'RCL-MD',
            'name' => 'Jubail Office',
            'loc_name' => 'HO',
            'unit_code' => '30502',
        ]);

    }
}
