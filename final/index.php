<?php
require_once('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>人生何其痛苦，只少咖啡甜一點</title> 
<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<style>
#right, #left {
	padding: 2em;
}
#left {
	height: 100%;
	
}
#content2 {
	margin-top: 2em;
	
}
</style>
<script>
$(document).ready(function(){
	$('#left dl li a').click(function(e){
		e.preventDefault();
		var txt = $(this).html();
		$('#right #query input[name="subject"]').val(txt);
		load_ajax();
	});
});
</script>
<script>
function trans_time(x) {
	return new Date(x*1000).toLocaleString();
}

function load_ajax() {
	var school = $('#query [name="school"]').val();
	var subject = $('#query [name="subject"]').val();
	var teacher = $('#query [name="teacher"]').val();
	
	var ar = {};
	if(school.length > 0)   ar['school'] = school;
	if(subject.length > 0)  ar['subject'] = subject;
	if(teacher.length > 0)  ar['teacher'] = teacher;

	$.ajax({
		url: 'ajax_comment.php',
		type: 'POST',
		dataType: 'json',
		data: ar,
		success: function(data) {
			var len = data['result'].length;
			var html = '';
			for(var i=0; i<len; i++) {
				html += '<b>留言時間</b>:' + trans_time(data['result'][i]['time_stamp']) + "<br>";
				html += '<b>學校</b>:' + data['result'][i]['school'] + "<br>";
				html += '<b>課程</b>:' + data['result'][i]['subject'] + "<br>";
				html += '<b>授課老師</b>:' + data['result'][i]['teacher'] + "<br>";
				html += '<b>評價</b>:<br>';
				html += data['result'][i]['comment'] + "<br>";
				html += '<hr>';
			}
			if(html == '') html = '找不到相符資料';
			$('#content').html(html);
		},
		error: function(){
			alert("Cannot load ajax_comment");
		}
	});
	//console.log(ar);
}


$(document).ready(function(){
	load_ajax();

	$('#query').submit(function(e){
		e.preventDefault();
		load_ajax();
	});
})
</script>
</head>

<body>
<div id="top" class="bs-docs-header">
	<p><marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="15"><font size="+5" face="標楷體" color="#FF0000">努力不一定會成功，但放棄一定會很輕鬆。</font></marquee></p>
    <img src="images/Wed-FCU.jpg" width="236" height="236">
    <img src="images/WebUp.jpg" width="782" height="242" class="imgborder1" >
	<div id="nav" class="container">
        <div class="row">
            <div id="header" class="col-lg-12">
                <ul class="nav nav-pills">
                    <li role="presentation"><a href="#">首頁</a></li>
                    <li role="presentation"><a href="#">簡介</a></li>
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            聯絡我們<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Email</a></li>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Google+</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="main" class="container-fluid">

<div id="left" class="col-md-3" role="complementary"><?php require_once('template-menu.php');?></div>
<div id="right" class="col-md-8" role="main">
	<div id="add-from"><?php require_once('template-add.php');?></div>
	<div id="content2">
		<form id="query">
	課程：<input name="subject">　老師：<input name="teacher">　學校：<input name="school"> <input type="submit" value="查詢">
</form>

<div id="content"></div>

</div>
</div>
</div>
</body>
</html>