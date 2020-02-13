<?php

function __autoload($classname) {
    if (substr($classname, -6) == 'Action') {
        require_once APP_PATH."Action/$classname.class.php";
    } else if ($classname == 'Model') {
        require_once "./luphp/$classname.class.php";
    } else if(substr($classname, -5) == 'Model'){
        require_once APP_PATH."Model/$classname.class.php";
    }else{
        require_once "./luphp/$classname.class.php";
    }
}

//URL系统函数改进
$path_info = !empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : ''; //  /a/b
if (empty($path_info)) {
    $model = new IndexAction;
    $model->index();
} else {
    $path_info_arr = explode("/", $path_info);
    $class = $path_info_arr[1] . 'Action';
    $model = new $class;
    $method = empty($path_info_arr[2])?'index':$path_info_arr[2];
    $model->$method();
}
/* 系统URL改写
  $class=isset($_GET['m'])?$_GET['m']:'index';
  $func=isset($_GET['a'])?$_GET['a']:'index';
  $class=$class.'Action';
  $u=new $class;
  $u->$func(); */
?>
