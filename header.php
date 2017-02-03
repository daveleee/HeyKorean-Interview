<?php  
	session_start();
	$loggedIn = isset($_SESSION['user_email']);	//로그인 유무
	$email = $_SESSION['user_email'];	//세션 변수에 저장 

?>