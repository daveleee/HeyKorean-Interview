<?php  
  	require_once($_SERVER["DOCUMENT_ROOT"] . '/heykorean-interview/header.php');
  	require_once($_SERVER["DOCUMENT_ROOT"] . '/heykorean-interview/config_local.php');

  	echo "biz_meetUp.php";

  	$kind = $_GET['kind'];
  	$boardNo = $_GET['boardNo'];
	$applyFrom = $_POST['optionsRadios'];
	$applyTo = $_GET['applyTo'];

	/*	Insert into meetup table depends on the $kind(1 or 2)	*/

	if ($kind == 1) {
		//	Update tbl_apply (apply_toApproval) 
		$sql1 = "UPDATE `heykorean`.`tbl_apply` SET `apply_toApproval`='1' WHERE ";
		$sql1 .= "`apply_boardNo`='$boardNo' AND `apply_from`='$applyFrom' AND `apply_to`='$applyTo';";
		$result1 = mysqli_query($conn, $sql1);

		//	Check match between apply_fromApproval and apply_toApproval
		$sql2 = "SELECT count(*) as count FROM tbl_apply ";
		$sql2 .= "WHERE apply_from='$applyFrom' AND apply_to='$applyTo' AND apply_fromApproval='1' AND apply_toApproval='1'";
		$result2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_assoc($result2);
		$count = $row2['count'];

		//	Check how amount 
      	$sql3 = "SELECT apply_amount FROM heykorean.tbl_apply ";
      	$sql3 .= "WHERE apply_boardNo = '$boardNo' AND apply_from='$applyFrom' AND apply_to='$applyTo'";
      	$result3 = mysqli_query($conn, $sql3);
      	$row3 = mysqli_fetch_assoc($result3);
      	$amount = $row3['apply_amount'];

		//	Insert into Meetup table if match($count=1)
		if ($count == 1) {
			$sql4 = "INSERT INTO `heykorean`.`tbl_meetUp` ";
			$sql4 .= "(`meetUp_kind`, `meetUp_role`, `meetUp_boardNo`, `meetUp_from`, `meetUp_to`, `meetUp_amount`, `meetUp_date`) ";
			$sql4 .= "VALUES ('$kind', 'tutee', '$boardNo', '$applyTo', '$applyFrom', '$amount', now());";
			$result4 = mysqli_query($conn, $sql4);

			//	Go to Payment Page ($kind, $boardNo, $meetupFrom, $meetupTo, $amount)
			echo("<script>location.replace('biz_payment.php?kind=$kind&boardNo=$boardNo&meetupFrom=$applyTo&meetupTo=$applyFrom&amount=$amount');</script>"); 
		}
		else {
			echo "Match failed.";
		}

	}
	else if ($kind == 2) {

	}
	else {
		echo "$kind can't find.";
	}
?>