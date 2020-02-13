<?php //error_reporting(0);
//require "config.php";
 class Model{
   public $select;
   public $from;
   public $where;
   public $order;
   public $limit;
   private $conn;
   public $table;

  function __construct($table){
    $this->table=$table;
    $this->conn=mysql_connect('localhost','root','root',true);
    mysql_select_db('mvc',$this->conn);
    mysql_query("set names utf8");
  }
   public function where($_where) {
    $this->where="where"." ".$_where;
    return $this;
   }
   /*public function order($_order='ORDER BY id DESC') {
    $this->order=$_order;
    return $this;
   }*/
 
 public function order() {
    $this->order='order by id';
    return $this;
 }
 
 /*public function limit($_limit='LIMIT 0,30') {
  $this->limit=$_limit;
  return $this;
 }*/
 public function limit($start,$page) {
    $this->limit="limit"." ".$start.','.$page;
    return $this;
 }
 
 public function select($_select='SELECT *') {
    $this->select=$_select."from"." ". $this->table;
    $sql=mysql_query($this->select.' '.$this->where.' '.$this->order.' '.$this->limit);
    while($arr=mysql_fetch_array($sql)){
        $data[]=$arr;
    }
    return  $data;
  
 }
//2014 04 06 16:43 �޸�
function update(Array $data ){
$fields=array();
$value=array();
foreach($data as $key=>$value){

$arr=(array($key,"'$value'"));
$f[]=implode ( "=" ,  $arr );
  }
   $x=implode ( "," ,  $f );  
echo $sql="UPDATE $this->table SET $x"." ".$this->where;
echo mysql_query($sql);

}
 
/*02-14 13:42*/
function insert(){
$data['name']='yes';
$data['sex']='I want you';
//$fields=array();
$v=array();
foreach($data as $key=>$value){
 $fields[]=$key;
 $values[]=$value; 
  }
 $f=implode ( "," ,  $fields );
 $v=implode ( "','" ,  $values );
echo $sql="INSERT INTO $this->table VALUES (NULL,'$v' )";
echo mysql_query($sql);
}


//��һ�� ���ܿ�����������ֵ�����飩
function add(Array $data){
$value=array();
foreach($data as $value){
    $values[]=$value; 
}
echo $v=implode ( "','" ,  $values );
echo $sql="INSERT INTO $this->table VALUES (NULL,'$v' )";
echo mysql_query($sql);
}


function delete(){
    mysql_query("delete from $this->table"." ".$this->where);
}


function modify(Array $data ,Array $id){
    $fields=array();
    $value=array();
    foreach($data as $key=>$value){
        $arr=(array($key,"'$value'"));
        $f[]=implode ( "=" ,  $arr );
    }
    $x=implode ( "," ,  $f );  
    foreach($id as $key=>$value){
        $id=$key;
        $v=$value;
    }

    echo $sql="UPDATE $this->table SET $x where $id='$v'";

    echo mysql_query($sql);

}

function query($sql){ 
    return mysql_query($sql);
}
/**********�޸ĵڶ��� δ��
function modify_two(Array $data ){
$fields=array();
$value=array();
foreach($data as $key=>$value){

$arr=(array($key,"'$value'"));
$f[]=implode ( "=" ,  $arr );
  }
   $x=implode ( "," ,  $f );
  
echo  $sql="UPDATE $this->table SET $x where ";

echo mysql_query($sql);
return $this;
}*/
/*********�ٷ�sql
$sql="UPDATE `one` SET `name` = 'nike', `sex` = 'boy' WHERE `id` = 20";
echo mysql_query($sql);*/

/* ����
function where($data){
 echo $this->where=$data;
 return $this;
}*/

/**
     * ������ݿ�
     */

/*$m=new Model('one');
$m->insert();*/
//$m->add($addData=array("name"  =>  "hard work" ,  "sex"  =>  "success") );

//$m->add("name"  =>  "orange" ,  "sex"  =>  "banana" );

/*$m=new Model('one');
$m->modify();*/
}
/*$m=new Model('register');
$a='aaa';
$arr=$m->where("name='$a'")->select();
var_dump($arr);*/

?>
