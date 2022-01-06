<?php 

	$db = mysqli_connect('localhost', 'root', '', 'php2');
	if($db){
		// echo 'database is connected';
	}else{
		die('database is error!'.mysqli_error($db));
	}

 ?>