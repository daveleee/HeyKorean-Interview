<?php 
  	require_once($_SERVER["DOCUMENT_ROOT"] . '/heykorean-interview/header.php');
  	require_once($_SERVER["DOCUMENT_ROOT"] . '/heykorean-interview/config_local.php');
 
	echo "user_info.php";
	echo "<br><br>";

	$boardNo = $_GET['boardNo'];
	$applyFrom = $_GET['applyFrom']; 
	
	echo "Board Number: " . $boardNo . "<br>";
	echo "User Email: " . $applyFrom . "<br>"; 

	$sql1 = "SELECT * FROM heykorean.tbl_apply WHERE apply_boardNo = '$boardNo' and apply_from = '$applyFrom'";
	$result1 = mysqli_query($conn, $sql1);
	while ($row1 = mysqli_fetch_assoc($result1)) {
		echo "Price: $" . $row1['apply_amount'];
	}

	echo "<br><br>";
	echo "Review: ";
?>