<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Lesson;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class LessonController extends Controller
{
    //
    public function index(Request $request){
//            $data = Lesson::all();
//            $data = DB::table('lesson')->paginate(15);
////////            return view('admin.lesson.index',compact('data'));
//////            return view('admin.lesson.index',['data'=>$data]);

        if($request->isMethod('get')){
            $data  = Lesson::all();
            return view('admin.lesson.index',compact('data'));
        }else if($request->isMethod('post')) {
            //接收拍序列
            $columnId = $request->input('order.0.column');
            //接收排序方式
            $orderWay = $request->input('order.0.dir');
            $columnName = $request->input('columns.'.$columnId.'.data');
            $offset = $request->input('start');
            $limit = $request->input('length');
            $title  = $request->input('title');
            $datemin = $request->input('datemin');
            $datemax = $request->input('datemax');
            $data = Lesson::offset($offset)
                ->limit($limit)
                ->where('lesson_name','like',"%$title%")
                ->where(function ($m) use($datemin,$datemax){
                    if($datemin != ''){
                        $m->where('created_at','>=',$datemin);
                    }
                    if($datemax != ''){
                        $m->where('created_at','<=',$datemax."23:59:59");
                    }
                })
                ->with(['course'=>function($c){
                    $c->with('profession');
                }])
                ->orderBy($columnName,$orderWay)
                ->get();
            $count = Lesson::count();
            $recordscount = Lesson::where('lesson_name','like','%$title%')
                ->where(function ($m) use($datemin,$datemax){
                    if($datemax != ''){
                        $m->where('created_at','<=',$datemin);
                    }
                    if($datemax != ''){
                        $m->where('created_at','>=',$datemax);
                    }
                })->count();
            $info = [
                'draw'=>$request->input('draw'),
                'recordsTotal'=>$count,
                'recordsFiltered'=>$count,
                'data'=>$data,
            ];
            return $info;
        }
    }
    public function add(Request $request){
        if($request->isMethod('get')){
            $course = Course::all();
            return view('admin.lesson.add',compact('course'));
        }elseif ($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'lesson_name'=>'required|unique|min:2:lesson,lesson_name',
                'course_id'=>'required|integer',
                'teacher_name'=>'required',
                'status'=>'required|boolean',
                'lesson_desc'=>'required|min:5'
            ];
            $msg = [
                'lesson_name.required'=>'课时名称不能为空',
                'lesson_name.min'=>'课时名称最少是2个字符',
                'lesson_name.unique'=>'课时名称已经存在',
                'course_id.required'=>'所属课程不能为空',
                'course_id.integer'=>'所属课程数据异常',
                'teacher_name.required'=>'讲师名称不能为空',
                'lesson_length.required'=>'课时长度不能为空',
                'status.boolean'=>'状态数据异常',
                'lesson_desc.required'=>'课时描述不能为空',
                'lesson_desc.min'=>'课时描述最少是5个字符'
            ];
            $validator = Validator::make($data,$rules,$msg);
            if($validator->passes()){
                $res = Lesson::create($data);
                if($res){
                    return ['info'=>1];
                }
            }else{
                $error = collect($validator->messages())->implode('0',',');
                return ['info'=>0,'error'=>$error];
            }
        }

    }
}
