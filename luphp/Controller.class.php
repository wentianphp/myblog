<?php

/**
 * LUPHP 控制器公共类
 * @copyright		        (C) 2013-2020 LUCMS
 * @author			QQ:914972243
 * @lastmodify			2014-8-8
 */
class Controller {

    public function __construct() {
        $lifeTime = 3600;
        session_set_cookie_params($lifeTime);
        session_start();
        date_default_timezone_set('PRC');
        require_once 'luphp/config/config.php';
        @ini_set('max_execution_time', '0');
        @set_time_limit(0);
		error_reporting(0);
    }

    //引进库文件
    public function library($libraryFile) {
        include_once $_SERVER['DOCUMENT_ROOT'] . '/luphp/library/' . $libraryFile . '.php';
    }

    //404页面
    public function __call($name, $arguments) {
        echo '404';
    }

    //替换HTML标签函数
    public function replaceHtml($str) {
        $str = str_replace("<p>", '', $str);
        $str = str_replace("</p>", '', $str);
        $str = str_replace("&nbsp;", '', $str);
        $str = str_replace("<br>", '', $str);
        $str = str_replace("</br>", '', $str);

        $str = preg_replace("/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i", " ", $str); //过滤img标签

        $str = preg_replace("/\s+/", " ", $str); //过滤多余回车

        $str = preg_replace("/<[ ]+/si", "<", $str); //过滤<__("<"号后面带空格)

        $str = preg_replace("/<\!--.*?-->/si", "", $str); //注释

        $str = preg_replace("/<(\!.*?)>/si", "", $str); //过滤DOCTYPE

        $str = preg_replace("/<(\/?html.*?)>/si", "", $str); //过滤html标签

        $str = preg_replace("/<(\/?head.*?)>/si", "", $str); //过滤head标签

        $str = preg_replace("/<(\/?meta.*?)>/si", "", $str); //过滤meta标签

        $str = preg_replace("/<(\/?body.*?)>/si", "", $str); //过滤body标签

        $str = preg_replace("/<(\/?link.*?)>/si", "", $str); //过滤link标签

        $str = preg_replace("/<(\/?form.*?)>/si", "", $str); //过滤form标签

        $str = preg_replace("/cookie/si", "COOKIE", $str); //过滤COOKIE标签

        $str = preg_replace("/<(applet.*?)>(.*?)<(\/applet.*?)>/si", "", $str); //过滤applet标签

        $str = preg_replace("/<(\/?applet.*?)>/si", "", $str); //过滤applet标签

        $str = preg_replace("/<(style.*?)>(.*?)<(\/style.*?)>/si", "", $str); //过滤style标签

        $str = preg_replace("/<(\/?style.*?)>/si", "", $str); //过滤style标签

        $str = preg_replace("/<(title.*?)>(.*?)<(\/title.*?)>/si", "", $str); //过滤title标签

        $str = preg_replace("/<(\/?title.*?)>/si", "", $str); //过滤title标签

        $str = preg_replace("/<(object.*?)>(.*?)<(\/object.*?)>/si", "", $str); //过滤object标签

        $str = preg_replace("/<(\/?objec.*?)>/si", "", $str); //过滤object标签

        $str = preg_replace("/<(noframes.*?)>(.*?)<(\/noframes.*?)>/si", "", $str); //过滤noframes标签

        $str = preg_replace("/<(\/?noframes.*?)>/si", "", $str); //过滤noframes标签

        $str = preg_replace("/<(i?frame.*?)>(.*?)<(\/i?frame.*?)>/si", "", $str); //过滤frame标签

        $str = preg_replace("/<(\/?i?frame.*?)>/si", "", $str); //过滤frame标签

        $str = preg_replace("/<(script.*?)>(.*?)<(\/script.*?)>/si", "", $str); //过滤script标签

        $str = preg_replace("/<(\/?script.*?)>/si", "", $str); //过滤script标签

        $str = preg_replace("/javascript/si", "Javascript", $str); //过滤script标签

        $str = preg_replace("/vbscript/si", "Vbscript", $str); //过滤script标签

        $str = preg_replace("/on([a-z]+)\s*=/si", "On\\1=", $str); //过滤script标签

        $str = preg_replace("/&#/si", "&＃", $str); //过滤script标签

        return $str;
    }

}
