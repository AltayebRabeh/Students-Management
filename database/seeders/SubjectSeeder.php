<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Classroom;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            ['name' => 'إحصاء', 'user_id' => User::all()->first()->id],
            ['name' => 'رياضيات متقطعة', 'user_id' => User::all()->first()->id],
            ['name' => 'حسبان', 'user_id' => User::all()->first()->id],
            ['name' => 'جبر خطي وهندسة تحليلية', 'user_id' => User::all()->first()->id],
            ['name' => 'مناهج بحث علمي', 'user_id' => User::all()->first()->id],
            ['name' => 'هندسة برمجيات', 'user_id' => User::all()->first()->id],
            ['name' => 'اساليب تسويق', 'user_id' => User::all()->first()->id],
            ['name' => 'إدارة', 'user_id' => User::all()->first()->id],
            ['name' => 'محاسبة', 'user_id' => User::all()->first()->id],
            ['name' => 'تطبيقات حاسوب', 'user_id' => User::all()->first()->id],
            ['name' => 'برمجة موجهه', 'user_id' => User::all()->first()->id],
            ['name' => 'برمجة مرئية', 'user_id' => User::all()->first()->id],
            ['name' => 'ذكاء إصطناعي', 'user_id' => User::all()->first()->id],
            ['name' => 'تعلم الالة', 'user_id' => User::all()->first()->id],
            ['name' => 'قواعد بيانات', 'user_id' => User::all()->first()->id],
            ['name' => 'لغة عربية', 'user_id' => User::all()->first()->id],
            ['name' => 'لغة إنجليزية', 'user_id' => User::all()->first()->id],
            ['name' => 'انظمة تشغيل', 'user_id' => User::all()->first()->id],
            ['name' => 'شبكات', 'user_id' => User::all()->first()->id],
            ['name' => 'تربية إسلامية', 'user_id' => User::all()->first()->id],
            ['name' => 'تشفير وامن معلومات', 'user_id' => User::all()->first()->id],
            ['name' => 'محاسبة مالية', 'user_id' => User::all()->first()->id],
            ['name' => 'جغرافيا', 'user_id' => User::all()->first()->id],
            ['name' => 'تاريخ', 'user_id' => User::all()->first()->id],
            ['name' => 'دراسات اسلامية', 'user_id' => User::all()->first()->id],
            ['name' => 'دراسات سودانية', 'user_id' => User::all()->first()->id],
            ['name' => 'الانسان والكون', 'user_id' => User::all()->first()->id],
            ['name' => 'مختبرات طبية', 'user_id' => User::all()->first()->id],
            ['name' => 'دراسة الاثار', 'user_id' => User::all()->first()->id],
        ];

        Subject::insert($subjects);
    }
}
