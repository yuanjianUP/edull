<?php
/**
 * Created by PhpStorm.
 * User: jian
 * Date: 2019/4/8
 * Time: 22:43
 */
function demo(){
    echo 'I am demo';
}
//获取url中的controller和action
function getUrlData(){
    $action = \Route::current()->getActionName();
    list($controller_name,$action_name) = explode('@',$action);
    $data['controller_name'] = ltrim(str_replace('Controller','',strrchr($controller_name,'\\')),'\\');
    $data['action_name'] = $action_name;
    return $data;
}