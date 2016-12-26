<?php
$dbh = NULL;

function conn_db()
{
	global $dbh;
	try {
		$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$dbh = new PDO('sqlite:log.db3', '', '', $options);
	} catch (PDOException $e) {
		echo $e. "\n";
		exit;
	}
}

function create()
{
	global $dbh;

	$cmd = "
PRAGMA main.page_size = 4096;
PRAGMA main.cache_size=10000;
PRAGMA main.locking_mode=EXCLUSIVE;
PRAGMA main.synchronous=NORMAL;
PRAGMA main.journal_mode=WAL;
PRAGMA main.cache_size=5000;
CREATE TABLE `log` (
  `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  `time_stamp` bigint NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  'comment' text DEFAULT NULL,
  'school' varchar(255) DEFAULT NULL,
  'teacher' varchar(255) DEFAULT NULL,
  'subject' varchar(255) DEFAULT NULL
);
CREATE INDEX IDX_id      ON log(id);
CREATE INDEX IDX_time    ON log(time_stamp);
CREATE INDEX IDX_ip      ON log(ip);
CREATE INDEX IDX_sch     ON log(school);
CREATE INDEX IDX_tea     ON log(teacher);
CREATE INDEX IDX_sub     ON log(subject);
";
	$dbh->exec($cmd);
}


conn_db();
//create();

?>
