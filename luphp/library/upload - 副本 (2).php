<?php
class Page {

    public $getPageNum;
    public $total_rows;
    public $per_page;
    public $base_url;

    public function page() {
        for ($i = $this->getPageNum - 2; $i <= $this->getPageNum + 2; $i++) {
            if ($i <= 0) {
                $i = 1;
            }

//            if (($total_rows/$page)>5){
//                $i=$getPageNum+2;
//            }
            //echo $i."<p>";
           $page[] = "<a href = " . $this->base_url . "?page=$i>" . $i . "</a>&nbsp";
        }
        return $page;
    }

}