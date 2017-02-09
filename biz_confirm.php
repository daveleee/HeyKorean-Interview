<?php 
  	require_once($_SERVER["DOCUMENT_ROOT"] . '/heykorean-interview/header.php');
  	require_once($_SERVER["DOCUMENT_ROOT"] . '/heykorean-interview/config_local.php');

  	$kind = $_GET['kind'];
  	$boardNo = $_GET['boardNo'];
  	$confirmFrom = $_GET['confirmFrom'];

  	echo "biz_meetUp.php";

  	echo "<br><br>";

  	echo "Review" . "<br><br>"; 

  	//	Update tbl_payment for confirm payment
  	$sql1 = "UPDATE `heykorean`.`tbl_payment` SET `payment_end`='1' WHERE `payment_boardNo`='$boardNo' AND `payment_from`='$confirmFrom';";
  	$result1 = mysqli_query($conn, $sql1);

  	//	Sending money hey korean to tutor
  	echo "Sending money hey korean to tutor";
  	echo "<br><br>";

	// Back to the board
	echo "<a href='biz_view.php?no=$boardNo&kind=$kind'>Complete</a>"; 

?>