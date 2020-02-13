
<?php
class Upload{
	public $path;
	public $type;
	public $tmp_name;
	public $size;
	public $input_name;

	public function uploads(){;
		return move_uploaded_file($_FILES[$this->input_name]["tmp_name"], $this->path.$_FILES[$this->input_name]["name"]);
	}


}
#demo start----------------------------------------
?>
<!------<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="filename" value=""/>
<input type="submit" value="sub" />
</form>--->
<?php
/*
$up = new Upload;
$up->path = "D:/".'8888';
$up->input_name = "filename";
$up->uploads();
 * 
 */
#demo end-----------------------------------------


//print_r($_FILES);die;
/*

$path = "D:/";        //上传路径  
 
 $result = move_uploaded_file($_FILES["filename"]["tmp_name"], $path.$_FILES["filename"]["name"]);
 die;
if (!file_exists($path)) {
	; //mkdir("$path", 0700);
}
$tp = array("image/gif", "image/pjpeg", "image/png", "image/jpg");

if ($_FILES["filename"]["name"]) {
	$file1 = $_FILES["filename"]["name"];
	$file2 = $path . date('Ymdhis') . $file1; //上传路径

	$way = 'http://yaoqianbao.com.cn/appimage/gift/' . date('Ymdhis') . $file1; //linux数据库访问路径

	$result = move_uploaded_file($_FILES["filename"]["tmp_name"], $file2);
}//END IF  

/*
Array
(
    [filename] => Array
        (
            [name] => psb.jpg
            [type] => image/jpeg
            [tmp_name] => C:\Windows\Temp\php8CA8.tmp
            [error] => 0
            [size] => 40938
        )

)
*/
