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

        $showDashboardStatistics = Permission::create(['name' => 'show-dashboard-statistics','display_name' => 'عرض إحصائيات لوحة التحكم',]);

        $search = Permission::create(['name' => 'search','display_name' => 'البحث',]);

        $showstudentGrades = Permission::create(['name' => 'print-student-grades','display_name' => 'طباعة تفاصيل طالب',]);
        $showstudentSemesterGrades = Permission::create(['name' => 'print-student-semester-grades','display_name' => 'طباعة نتيجة فصل لطالب',]);
        $showCheckList = Permission::create(['name' => 'print-check-list','display_name' => 'طباعة قوائم الدرجات',]);
        $showStudentsList = Permission::create(['name' => 'print-students-list','display_name' => 'طباعة قوائم الطلاب',]);
        $showSupplementsList = Permission::create(['name' => 'print-supplements-list','display_name' => 'طباعة قائمة الملاحق والبدائل',]);
        $showSupplements = Permission::create(['name' => 'print-supplements','display_name' => 'طباعة نتيجة الملاحق والبدائل',]);
        $showSemesterGrades = Permission::create(['name' => 'print-semester-grades','display_name' => 'طباعة درجات فصل',]);
        $gradesStatistics = Permission::create(['name' => 'print-grades-statistics','display_name' => 'طباعة تقرير نسب نجاح الفصول',]);

        $showStudents = Permission::create(['name' => 'show-students','display_name' => 'عرض الطلاب',]);
        $createStudents = Permission::create(['name' => 'create-students','display_name' => 'إضافة الطلاب',]);
        $editStudents = Permission::create(['name' => 'edit-students','display_name' => 'تعديل الطلاب',]);
        $deleteStudents = Permission::create(['name' => 'delete-students','display_name' => 'حذف الطلاب',]);
        $showStudentsArchive = Permission::create(['name' => 'show-students-archive','display_name' => 'عرض الطلاب المؤرشفين',]);
        $AddStudentToArchive = Permission::create(['name' => 'add-student-to-archive','display_name' => 'إظافة طالب إلى الارشيف',]);
        $removeStudentFromArchive = Permission::create(['name' => 'remove-student-from-archive','display_name' => 'إلغاء ارشفة طالب',]);

        $showSections = Permission::create(['name' => 'show-sections','display_name' => 'عرض الاقسام',]);
        $createSections = Permission::create(['name' => 'create-sections','display_name' => 'إضافة الاقسام',]);
        $editSections = Permission::create(['name' => 'edit-sections','display_name' => 'تعديل الاقسام',]);
        $deleteSections = Permission::create(['name' => 'delete-sections','display_name' => 'حذف الاقسام',]);

        $createSemesterGrades = Permission::create(['name' => 'create-semester-grades','display_name' => 'إضافة درجات فصل',]);
        $editSemesterGrades = Permission::create(['name' => 'edit-semester-grades','display_name' => 'زيادة درجات فصل',]);
        $deleteSemesterGrades = Permission::create(['name' => 'delete-semester-grades','display_name' => 'حذف درجات فصل',]);
        $createSupplements = Permission::create(['name' => 'create-supplements','display_name' => 'إضافة درجات ملحق او بديل',]);
        $createstudentGrades = Permission::create(['name' => 'create-student-grades','display_name' => 'إضافة درجات طالب',]);

        $showTeachers = Permission::create(['name' => 'show-teachers','display_name' => 'عرض الاساتذة',]);
        $createTeachers = Permission::create(['name' => 'create-teachers','display_name' => 'إضافة الاساتذة',]);
        $editTeachers = Permission::create(['name' => 'edit-teachers','display_name' => 'تعديل الاساتذة',]);
        $deleteTeachers = Permission::create(['name' => 'delete-teachers','display_name' => 'حذف الاساتذة',]);

        $showSubjects = Permission::create(['name' => 'show-subjects','display_name' => 'عرض المواد',]);
        $createSubjects = Permission::create(['name' => 'create-subjects','display_name' => 'إضافة مواد',]);
        $editSubjects = Permission::create(['name' => 'edit-subjects','display_name' => 'تعديل مواد',]);
        $deleteSubjects = Permission::create(['name' => 'delete-subjects','display_name' => 'حذف مواد',]);

        $showSubjectsTeachers = Permission::create(['name' => 'show-subjects-teachers','display_name' => 'عرض المواد و الاساتذة',]);
        $addSubjectsTeachers = Permission::create(['name' => 'create-subjects-teachers','display_name' => 'إضافة مواد الى الاساتذة',]);
        $editSubjectsTeachers = Permission::create(['name' => 'edit-subjects-teachers','display_name' => 'تعديل المواد و الاساتذة',]);
        $deleteSubjectsTeachers = Permission::create(['name' => 'delete-subjects-teachers','display_name' => 'حذف المواد و الاساتذة',]);

        $showArchive = Permission::create(['name' => 'show-archive','display_name' => 'عرض الارشيف',]);
        $addArchive = Permission::create(['name' => 'create-archive','display_name' => 'السماح بالارشفة',]);
        $unArchive = Permission::create(['name' => 'un-archive','display_name' => 'إلغاء الارشفة',]);
        $deleteArchive = Permission::create(['name' => 'delete-archive','display_name' => 'حذف من الارشيف',]);

        $showYears = Permission::create(['name' => 'show-years','display_name' => 'عرض السنين الدراسية',]);
        $createYears = Permission::create(['name' => 'create-years','display_name' => 'إضافة السنين الدراسية',]);
        $editYears = Permission::create(['name' => 'edit-years','display_name' => 'تعديل السنين الدراسية',]);
        $deleteYears = Permission::create(['name' => 'delete-years','display_name' => 'حذف السنين الدراسية',]);

        $showEquations = Permission::create(['name' => 'show-equations','display_name' => 'عرض المعادلات',]);
        $createEquations = Permission::create(['name' => 'create-equations','display_name' => 'إضافة المعادلات',]);
        $editEquations = Permission::create(['name' => 'edit-equations','display_name' => 'تعديل المعادلات',]);
        $deleteEquations = Permission::create(['name' => 'delete-equations','display_name' => 'حذف المعادلات',]);

        $showMarks = Permission::create(['name' => 'show-marks','display_name' => 'عرض الدرجات والرموز',]);
        $createMarks = Permission::create(['name' => 'create-marks','display_name' => 'إضافة الدرجات والرموز',]);
        $deleteMarks = Permission::create(['name' => 'delete-marks','display_name' => 'حذف الدرجات والرموز',]);

        $showRelays = Permission::create(['name' => 'show-relays','display_name' => 'عرض الترحيلات',]);
        $createRelays = Permission::create(['name' => 'create-relays','display_name' => 'إضافة ترحيلات',]);
        $backRelays = Permission::create(['name' => 'back-relays','display_name' => 'إرجاع ترحيلات',]);

        $showUsers = Permission::create(['name' => 'show-users','display_name' => 'عرض المستخدمين',]);
        $createUsers = Permission::create(['name' => 'create-users','display_name' => 'إضافة مستخدمين',]);
        $editUsers = Permission::create(['name' => 'edit-users','display_name' => 'تعديل مستخدمين',]);
        $deleteUsers = Permission::create(['name' => 'delete-users','display_name' => 'حذف مستخدمين',]);

        $settings = Permission::create(['name' => 'settings','display_name' => 'الاعدادات',]);

        $ActivityLog = Permission::create(['name' => 'activity-log','display_name' => 'Activity Log',]);


    }
}
