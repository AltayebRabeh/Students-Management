<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RolePermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'مدير النظام', // optional
            'description' => 'يمكنه الادارة والتحكم في كافة النظام', // optional
        ]);

        $user = User::first();
        $user->syncRoles([$admin->id]);

        $manageStudents = Permission::create(['name' => 'manage-students','display_name' => 'عرض الطلاب',]);
        $showStudents = Permission::create(['name' => 'show-students','display_name' => 'عرض الطلاب',]);
        $createStudents = Permission::create(['name' => 'create-students','display_name' => 'تسجيل الطلاب',]);
        $editStudents = Permission::create(['name' => 'edit-students','display_name' => 'تعديل الطلاب',]);
        $deleteStudents = Permission::create(['name' => 'delete-students','display_name' => 'حذف الطلاب',]);
        $showStudentsArchive = Permission::create(['name' => 'show-students-archive','display_name' => 'عرض الطلاب المؤرشفين',]);
        $AddStudentToArchive = Permission::create(['name' => 'add-student-to-archive','display_name' => 'إظافة طالب إلى الارشيف',]);
        $removeStudentFromArchive = Permission::create(['name' => 'remove-student-from-archive','display_name' => 'إلغاء ارشفة طالب',]);


    }
}
