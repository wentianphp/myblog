<?php
 mysql_connect('localhost','root','root');
mysql_select_db('guo');

class page{
	 public $pagelist;        //每页显示几条
	 public $start;           //起
	 public $sum;            //总数
	 public $pagecount;     //共有几页
	 public $table;
	 public $value;
 
 function __construct($pagelist,$start=0){
	 $this->pagelist=$pagelist;
	 $this->start=$start;
	 if(empty($_REQUEST['v'])){
		$this->value=1;
	 }else{
		$this->value=$_REQUEST['v']; 
	 }     
	   $this->start=($this->value-1)*$this->pagelist;
 }
 //总行数
 function sum($table){
     $this->table=$table;
	 $sql=mysql_query("SELECT * FROM $this->table");
     return $this->sum=mysql_num_rows($sql); 
 }
 function show(){
     return $this->pagecount=ceil($this->sum/$this->pagelist);  
 }
}
$p=new page(2);//①
$p->sum('a'); //②

$sql=mysql_query("select * from a limit $p->start,$p->pagelist");
while($arr=mysql_fetch_array($sql)){
echo $arr['id'];
}
//分页显示③
$s=$p->show();
for($i=1;$i<=$s;$i++){
         echo "<a href=' ?v=".$i."'>".$i."</a>&nbsp;";
      }
?>
