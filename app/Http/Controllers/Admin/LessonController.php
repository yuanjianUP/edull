<?php

namespace App\Http\Controllers\Admin;

use App\Lesson;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
}
