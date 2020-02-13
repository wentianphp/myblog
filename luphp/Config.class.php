<?php
//****************************
/*smarty 后台配置*/
//****************************
//后台
class config extends Smarty{
	//require_once("./libs/Smarty.class.php");
	function __construct(){
		$this->left_delimiter	=	"{";
		$this->right_delimiter	=	"}";
		$this->template_dir	=	"./admin/templates/";//模板文件存储位置
		$this->compile_dir	= "./templates_c/admin/";//模板编译存储位置
		$this->caching	=	false;
		$this->cache_dir	=	"./admin/cache/";//缓存文件存储位置
		$this->cache_lifetime	=	10;
		//define("SMARTY_DIR", $_SERVER["HTTP_HOST"]);
		define("SMARTY_HOST", 'http://test.luphp.com');
		define("SMARTY_TEM", 'http://'.$_SERVER["HTTP_HOST"].'/admin/templates/');
	}
}


?>