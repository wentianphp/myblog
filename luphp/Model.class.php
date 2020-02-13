<?php

include $_SERVER['DOCUMENT_ROOT'] . "/luphp/config/database.php";

class Model {

    private $host = DBHOST;
    private $user = DBUSER;
    private $pwd = DBPWD;
    private $dbName = DBNAME;
    private $dbCode = DBCODE;
    private $find;
    private $select;
    private $max;
    private $count;
    private $field;
    private $join;
    private $from;
    private $where;
    private $order;
    private $limit;
    private $conn;
    private $table;

    function __construct($table) {
        $this->table = $table;
        if (!$this->conn) {
            $this->conn = mysqli_connect($this->host, $this->user, $this->pwd, $this->dbName);
            mysqli_select_db($this->conn, $this->dbName);
            $this->query("set names " . $this->dbCode);
        }
    }

    public function max($field) {
        $sql = "select max($field) from " . $this->table . $this->where;
        $rel = $this->query($sql);
        while ($arr = mysqli_fetch_assoc($rel)) {
            return $arr;
        }
        return $this;
    }

    public function field($field) {
        $this->field = $field;
        return $this;
    }

    public function join($join) {
        $this->join = $join;
        return $this;
    }

    public function where($where) {
        $this->where = " where " . $where;
        return $this;
    }

    public function order($order) {
        $this->order = ' order by ' . $order;
        return $this;
    }

    public function limit($start, $page) {
        $this->limit = " limit " . $start . ',' . $page;
        return $this;
    }

    public function find($_find = 'SELECT ') {
        $this->field = empty($this->field) ? ' * ' : $this->field;
        $this->find = $_find . $this->field . " from " . $this->table;
        $sql = $this->find . ' ' . $this->join . $this->where;
        $rel = $this->query($sql);
        $arr = mysqli_fetch_assoc($rel);
        return $arr;
    }

    public function select($_select = 'SELECT ') {
        $this->field = empty($this->field) ? ' * ' : $this->field;
        $this->select = $_select . $this->max . $this->field . $this->count . " from " . $this->table;
        $sql = $this->select . ' ' . $this->join . $this->where . $this->order . $this->limit;
        $rel = $this->query($sql);
        while ($arr = mysqli_fetch_assoc($rel)) {
            $data[] = $arr;
        }
        return $data;
    }

    public function query($sql) {
        return mysqli_query($this->conn, $sql);
    }

//2014 06 04 ①
    function update(Array $data) {
        $fields = array();
        $value = array();
        foreach ($data as $key => $value) {
            $arr = (array($key, "'$value'"));
            $fields[] = implode("=", $arr);
        }
        $x = implode(",", $fields);
        echo $sql = "UPDATE $this->table SET $x" . $this->where;
        $this->query($sql);
    }

    /* 02-14 13:42insert方法 2 */

    function insert() {
        $data['name'] = 'yes';
        $data['sex'] = 'I want you';
//$fields=array();
        $v = array();
        foreach ($data as $key => $value) {
            $fields[] = $key;
            $values[] = $value;
        }
        $f = implode(",", $fields);
        $v = implode("','", $values);
        echo $sql = "INSERT INTO $this->table VALUES (NULL,'$v' )";
        $this->query($sql);
    }

//最简洁insert方法 1 2014-03
    function add(Array $data) {
        $value = array();
        foreach ($data as $key => $value) {
            $keys[] = $key;
            $values[] = $value;
        }
        $keyStr = implode(",", $keys);
        $valStr = implode("','", $values);
        $sql = "INSERT INTO $this->table(id,$keyStr) VALUES (NULL,'$valStr' )";
        $this->query($sql);
    }

    function delete() {
        $sql = "delete from $this->table" . $this->where;
        $this->query($sql);
    }

//②
    function modify(Array $data, Array $id) {
        $fields = array();
        $value = array();
        foreach ($data as $key => $value) {
            $arr = (array($key, "'$value'"));
            $f[] = implode("=", $arr);
        }
        $x = implode(",", $f);
        foreach ($id as $key => $value) {
            $id = $key;
            $v = $value;
        }
        $sql = "UPDATE $this->table SET $x where $id='$v'";
        $this->query($sql);
    }

//    function query($sql) {
//        return $arr = $this->query($sql);
//        while ($relsult = mysqli_fetch_assoc($arr)) {
//            $data[] = $relsult;
//        }
//        return $data;
//    }
//返回表字段 field=》‘’
    function fields() {
        $arr = $this->query("desc  " . $this->table);
        while ($relsult = mysqli_fetch_assoc($arr)) {
            $data[] = $relsult;
        }
        foreach ($data as $key => $v) {
            $kv[$v['Field']] = "";
        }
        return $kv;
    }

    function getAll($sql) {
        $sqlObj = $this->query($sql);
        //print_r($sqlObj);
        if ($sqlObj == TRUE) {
            while ($relsult = mysqli_fetch_assoc($sqlObj)) {
                $data[] = $relsult;
            }
        }
        return empty($data)?"data null":$data;
    }

    function getRow($sql) {
        $sqlObj = $this->query($sql);
        if ($sqlObj == TRUE) {
            $relsult = mysqli_fetch_assoc($sqlObj);
        }
        return $relsult;
    }

    /*     * ********�޸ĵڶ��� δ��
      function modify_two(Array $data ){
      $fields=array();
      $value=array();
      foreach($data as $key=>$value){

      $arr=(array($key,"'$value'"));
      $f[]=implode ( "=" ,  $arr );
      }
      $x=implode ( "," ,  $f );

      echo  $sql="UPDATE $this->table SET $x where ";

      echo $this->query($sql);
      return $this;
      } */
    /*     * *******�ٷ�sql
      $sql="UPDATE `one` SET `name` = 'nike', `sex` = 'boy' WHERE `id` = 20";
      echo $this->query($sql); */

    /* ����
      function where($data){
      echo $this->where=$data;
      return $this;
      } */

    /**
     * ������ݿ�
     */
    /* $m=new Model('one');
      $m->insert(); */
//$m->add($addData=array("name"  =>  "hard work" ,  "sex"  =>  "success") );
//$m->add("name"  =>  "orange" ,  "sex"  =>  "banana" );

    /* $m=new Model('one');
      $m->modify(); */
}

//$m = new Model('category');
//$m->test();
//$arr=$m->where('id=11')->select();
//print_r($arr);die;
?>
