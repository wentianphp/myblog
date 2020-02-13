<?php

class Page {

    public $getPageNum;
    public $total_rows;
    public $per_page;
    public $base_url;

    function __construct(){
    
    }
    
    public function page() {

        for ($i = $this->getPageNum - 2; $i <= $this->getPageNum + 2; $i++) {
            if ($i <= 0) {
                $i = 1;
            }
            $arr[] = $i;
        }

        if (@($this->total_rows % $this->per_page) == 0) {
            $pages = @floor($this->total_rows / $this->per_page);
        } else {
            $pages = (floor($this->total_rows / $this->per_page)) + 1;
        }

        foreach ($arr as $k => $v) {
            if ($arr[$k] > $pages) {
                unset($arr[$k]);
            }
        }

        $page_data = array();
//原始版本
//        foreach ($arr as $ks => $vs) {
//            $page_data[] = "<a href = " . $this->base_url . "?page=" . $vs . ">" . $vs . "</a>&nbsp";
//        }
        foreach ($arr as $k => $v) {
            $page_data[] = array("url" => $this->base_url, "page" => $v);
        }
        return $page_data;
    }

}
