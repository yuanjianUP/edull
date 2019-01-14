<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profession')->insert([
            [
                'profession_name'=>'php&html'
            ],
            [
                'profession_name'=>'linux高级编程'
            ],
            [
                'profession_name'=>'c++'
            ],

        ]);
        Db::table('course')->insert([
            [
                'course_name'=>'php基础',
                'profession_id'=>1,
                'course_price'=>1235
            ],
            [
                'curse_name'=>'Lamp环境安装',
                'profession_id'=>2,
                'course_price'=>1420,
            ],
            [
                'curse_name'=>'c高级语言',
                'profession_id'=>3,
                'course_price'=>6800
            ],
        ]);
    }
}
