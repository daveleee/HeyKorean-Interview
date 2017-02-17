<?php 	
  	require_once($_SERVER["DOCUMENT_ROOT"] . '/heykorean-interview/header.php');
  	require_once($_SERVER["DOCUMENT_ROOT"] . '/heykorean-interview/config_local.php');
 
 	$kind = trim($_GET['kind']);
 	$boardNo = trim($_GET['boardNo']);
 	$amount = trim($_GET['amount']);
 	$meetupFrom = trim($_GET['meetupFrom']);
 	$meetupTo = trim($_GET['meetupTo']);

 	$cardNo = trim($_POST['number']);
 	$cardValid = trim($_POST['exp']);
 	$cardCVV = trim($_POST['cvv']);
 	$cardHolder = trim($_POST['name']);

	/*	Insert into payment table depends on the $kind(1 or 2)	*/
	if ($kind == 1) {
	 	$sql1 = "INSERT INTO `heykorean`.`tbl_payment` (`payment_kind`, `payment_role`, `payment_boardNo`, `payment_from`, `payment_to`, `payment_cardNo`, `payment_cardValid`, `payment_cardCVV`, `payment_cardHolder`, `payment_amount`, `payment_end`) VALUES ('$kind', 'tutee', '$boardNo', '$meetupFrom', '$meetupTo', '$cardNo', '$cardValid', '$cardCVV', '$cardHolder', '$amount', '0');";
	 	$result1 = mysqli_query($conn, $sql1);

		// Back to the board
        echo "<script type='text/javascript'>alert('Payment Complete!'); location.replace('biz_view.php?no=$boardNo&kind=$kind');</script>"; 
	}
	else if ($kind == 2) {
	 	$sql2 = "INSERT INTO `heykorean`.`tbl_payment` (`payment_kind`, `payment_role`, `payment_boardNo`, `payment_from`, `payment_to`, `payment_cardNo`, `payment_cardValid`, `payment_cardCVV`, `payment_cardHolder`, `payment_amount`, `payment_end`) VALUES ('$kind', 'tutor', '$boardNo', '$meetupFrom', '$meetupTo', '$cardNo', '$cardValid', '$cardCVV', '$cardHolder', '$amount', '0');";
	 	$result2 = mysqli_query($conn, $sql2);

		// Back to the board
        echo "<script type='text/javascript'>alert('Payment Complete!'); location.replace('biz_view.php?no=$boardNo&kind=$kind');</script>"; 
	}
	else {
		echo "$kind error.";
	}
?> 