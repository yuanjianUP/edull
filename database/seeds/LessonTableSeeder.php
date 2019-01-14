<?php

use Illuminate\Database\Seeder;

class LessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('lesson')->insert([
            [
                'lesson_name'=>'php数组',
                'course_id'=>1,
                'teacher_name'=>'老李',
                'lesson_desc'=>'这是一个测试',
            ],
            [
                'lesson_name'=>'服务器配置',
                'course_id'=>2,
                'teacher_name'=>'老王',
                'lesson_desc'=>'这是第二个测试',
            ],
        ]);
    }
}
