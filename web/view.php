<?php
require_once('config.php');
?>

<html lang="zh-TW"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>看評論</title>

</head>

<body>
<?php
$sql = 'SELECT * FROM log';
$stmt = $dbh->query($sql);

while( $result = $stmt->fetch(PDO::FETCH_ASSOC) )
{
	echo '<b>留言時間</b>:'. date('Y-m-d h:i:s',$result['time_stamp']). "<br>";
	echo '<b>學校</b>:'. $result['school']. "<br>";
	echo '<b>課程</b>:'. $result['subject']. "<br>";
	echo '<b>授課老師</b>:'. $result['teacher']. "<br>";
	echo '<b>評價</b>:<br>';
	echo $result['comment']. "<br>";
	echo '<hr>';
}
?>

</body></html>
