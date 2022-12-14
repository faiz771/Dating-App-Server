<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        $data = [
            ['name' =>  ucfirst('view dashboard'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('users/customers'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('manage customers/users'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('users approval requests'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('packages'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('manage packages'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('manage package services'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('orders'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('view pending orders'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('view completed orders'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('view running orders'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('manage orders'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('accounts'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('manage sales'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('manage accounts sheet'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('visitors'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('manage contact-us messages'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('Site Visitors'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('roles & permissions'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('manage roles'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('manage permissions'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('manage role permissions'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('web setting'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('manage site services'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('manage testimonials'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('manage site images'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('manage site content'), 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  ucfirst('manage site package plans'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Create User/Customer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Active/Deactive User/Customer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'View User/Customer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edit User/Customer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delete User/Customer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Approve User/Customer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Create Package', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'View Package', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edit Package', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delete Package', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Create Package Service', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edit Package Service', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delete Package Service', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edit Order', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delete Order', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delete Sale', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Add Expense', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Profit & Loss Sheet', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'View Contact-us Message', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delete Contact-us Message', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delete Site Visitor', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Create Role', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edit Role', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delete Role', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Create Permission', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edit Permission', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delete Permission', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Assign Permission', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'View Role Permissions', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edit Role Permission', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delete Role Permission', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Create Site Service', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edit Site Service', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delete Site Service', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Create Testimonials', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edit Testimonials', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delete Testimonials', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Send Whatsapp Message', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Send Visitor Mail', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Set Site Package Plan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edit Site Package Plan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edit Site Package Plan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Set Package Plan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Set Site Images', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edit Site Images', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delete Site Images', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Set Site Content', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edit Site Content', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delete Site Content', 'created_at' => now(), 'updated_at' => now()],

        ];

        Permission::insert($data);
    }
}
