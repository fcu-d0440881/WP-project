<?php
require_once('config.php');

$res = array();
$res['result'] = array();
$sql = 'SELECT * FROM log';

$check_post = array('school', 'teacher', 'subject');
$first = true;
foreach($check_post as $i) if( isset( $_POST[$i] ) ) {
	
	if($first) { $sql .= ' WHERE'; $first = false; }
	else { $sql .= ' AND'; }
	
	$sql .= " ". $i. " LIKE '". $_POST[$i]. "%'"; 
}


$stmt = $dbh->query($sql);

while( $result = $stmt->fetch(PDO::FETCH_ASSOC) )
{
	$res['result'][] = $result;
}
echo json_encode($res);
?>
