<?php
	session_start();
	
	$userEmail = trim($_POST['inputEmail']);
	$userPassword = trim($_POST['inputPassword']);

	require_once($_SERVER["DOCUMENT_ROOT"] . '/heykorean-interview/config_local.php');


	// ID PW input check
	if(empty($userEmail) || empty($userPassword)) {
		echo "<script> alert('Please enter your email or password.'); history.back(); </script>"; 
	}

	else {	
		// ID valid check from database
		$sql1 = "SELECT count(*) as count FROM heykorean.tbl_user WHERE user_email='$userEmail' AND user_password='$userPassword'";
		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_assoc($result1);

		if($row1['count'] > 0) {

			// Success to login
			$sql2 =  "SELECT * FROM heykorean.tbl_user";
			$_SESSION['user_email'] = $userEmail;

			// Access to Main display
			echo "<script> top.location.href = '../biz_list.php'; </script>"; 
		}

		else {	

			// Failed to login (Wrong email or password. Try again.)
			echo "<script> alert('Wrong email or password. Try again.'); history.back(); </script>";  
		}

	}



	mysqli_close($conn);	//DB disconnect
?>