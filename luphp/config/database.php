<?php
/** 
 * +------------------------------------------------------------------------ 
 * | 程序名称：LuCMS系统
 * +------------------------------------------------------------------------ 
 * | Copyright (c) 2013 - 2114 http://www.lucms.com/ All rights reserved. 
 * +------------------------------------------------------------------------ 
 * | Author: steven lu <e-mail:admin@lucms.com> <QQ:914972243> 
 * +------------------------------------------------------------------------ 
 * | 文件说明：数据库配置文件
 * +------------------------------------------------------------------------ 
 */

/**
 * 数据库配置数组

return array(
	"dbtype" => "mysql",          //数据库类型
	"host"   => "localhost",      //数据库访问地址
	"user"   => "root",           //数据库访问用户名
	"password"  => "root",        //数据库访问密码
	"dbname" => "lucms",       	  //数据库名
	"prefix" => "",       		  //表前缀
	"charset"=> "utf8",           //编码
	"port"   => "3306"            //数据库连接端口
);
 */


 define('DBHOST', '127.0.0.1');
 define('DBUSER', 'root');
 define('DBPWD', 'root');
 define('DBNAME', 'myblog');
 define('DBCODE', 'utf8');
 define('DBCONN', 0);
 define('DOUBLEPRE', '1');
 define('MORESITE', '1');
 define('USEMC', false);

?>

