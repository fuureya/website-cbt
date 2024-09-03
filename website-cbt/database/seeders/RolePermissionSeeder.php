<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // permision seeder
        $permissions = [
            "view Courses",
            "create Courses",
            "edit Courses",
            "delete Courses"
        ];

        foreach ($permissions as $perm) {
            Permission::create([
                "name" => $perm
            ]);
        }

        // role seeder
        $teacherRole = Role::create([
            "name" => "teacher"
        ]);

        $teacherRole->givePermissionTo([
            "view Courses",
            "create Courses",
            "edit Courses",
            "delete Courses"
        ]);

        $studentRole = Role::create([
            "name" => "student"
        ]);

        $studentRole->givePermissionTo([
            "view Courses",
        ]);

        // membuat data user superadmin
        $user = User::create([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("admin"),
        ]);
        $user->assignRole($teacherRole);
    }
}
