<?php
require_once('config.php');

function check($x) {
	if(!$x || strlen($x)<=0) return false;
	return true;
}


$data = array(
	'comment',
	'school',
	'teacher',
	'subject'
);
foreach($data as $i) {
	if(!check($_POST[$i])) 
	{
		echo $i. ' 的值不能是空的';
		exit(0);
	}
}


$sql = 'INSERT INTO log (time_stamp,ip,comment,school,teacher,subject) values (?,?,?,?,?,?)';
$bind = array(
	time(), // 第一個 ? 的值
	$_SERVER['remote_addr'], //第二個?的值
	$_POST['comment'],
	$_POST['school'],
	$_POST['teacher'],
	$_POST['subject']
);
$stmt = $dbh->prepare($sql);
$stmt->execute($bind);
echo '增加留言成功';
?>
