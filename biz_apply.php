<?php 
  	require_once($_SERVER["DOCUMENT_ROOT"] . '/heykorean-interview/header.php');
  	require_once($_SERVER["DOCUMENT_ROOT"] . '/heykorean-interview/config_local.php');
 

	echo "biz_apply.php";
	echo "<br><br>";

	$kind = $_GET['kind'];
	$boardNo = $_GET['boardNo'];
	$applyFrom = $_GET['applyFrom'];
	$applyTo = $_GET['applyTo'];
	$amount = floor($_POST['amount'] * 100) / 100;
	
	echo $kind . "<br>";
	echo $boardNo . "<br>";
	echo $applyFrom . "<br>";
	echo $applyTo . "<br>";
	echo $amount;

	// Insert to tbl_apply depends on the $kind(1 or 2)
	if ($kind == 1) {
		$sql1 = "INSERT INTO `heykorean`.`tbl_apply` (`apply_no`, `apply_kind`, `apply_role`, `apply_boardNo`, `apply_from`, `apply_to`, `apply_date`, `apply_amount`, `apply_fromApproval`, `apply_toApproval`) VALUES (NULL, '1', 'tutor', '$boardNo', '$applyFrom', '$applyTo', now(), '$amount', '1', '0');";
		$result1 = mysqli_query($conn, $sql1);

		// Back to the board
        echo "<script type='text/javascript'>alert('Applied'); history.back();</script>"; 
	}
	else if ($kind == 2) {
		$sql2 = "INSERT INTO `heykorean`.`tbl_apply` (`apply_no`, `apply_kind`, `apply_role`, `apply_boardNo`, `apply_from`, `apply_to`, `apply_date`, `apply_amount`, `apply_fromApproval`, `apply_toApproval`) VALUES (NULL, '2', 'tutee', '$boardNo', '$applyFrom', '$applyTo', now(), '$amount', '1', '0');";
		$result2 = mysqli_query($conn, $sql2);

		// Back to the board
        echo "<script type='text/javascript'>alert('Applied'); history.back();</script>"; 
	}
?>