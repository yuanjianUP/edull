<?php

namespace App\Http\Controllers\Admin;

use App\Paper;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PaperController extends Controller
{
    //
    public function index(){
        $data = Paper::all();
//        dump($paper->course());exit;
        return view('admin.paper.index',compact('data'));
    }
}
