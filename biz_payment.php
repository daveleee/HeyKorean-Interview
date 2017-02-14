<?php	
  	require_once($_SERVER["DOCUMENT_ROOT"] . '/heykorean-interview/header.php');
  	require_once($_SERVER["DOCUMENT_ROOT"] . '/heykorean-interview/config_local.php');

 	$kind = $_GET['kind'];
 	$boardNo = $_GET['boardNo'];
 	$meetupFrom = $_GET['meetupFrom'];
 	$meetupTo = $_GET['meetupTo'];
 	$amount = $_GET['amount'];
 
 	echo "<h3>Total: $".$amount."</h3>";

 	//	Pay to Hey korean First and Save the data

?>
		<script type="text/javascript">
			function checkInput() {
		    	if (paymentForm.number.value=="") {
		        	alert("Input the card number.");
		        	paymentForm.number.focus();
		        	return false;
				}
		    	if (paymentForm.exp.value=="") {
		        	alert("Input the card expiry date.");
		        	paymentForm.exp.focus();
		        	return false;
				}
		    	if (paymentForm.cvv.value=="") {
		        	alert("Input the security code.");
		        	paymentForm.cvv.focus();
		        	return false;
				}
		    	if (paymentForm.name.value=="") {
		        	alert("Input the card holder name.");
		        	paymentForm.name.focus();
		        	return false;
				}
			}
		</script>
		<form name="paymentForm" action="biz_purchase.php?kind=<?php echo $kind; ?>&boardNo=<?php echo $boardNo; ?>&amount=<?php echo $amount; ?>&meetupFrom=<?php echo $meetupFrom; ?>&meetupTo=<?php echo $meetupTo; ?>" method="post" onsubmit="return checkInput()">
          <div class="col-lg-6">  
            <p><b>Pay with credit card</b></p>  <br><br> 

            <div class="col-lg-12">
              Card Type
              <select name="type" id="type" tabindex="3">
                <option value="visa">VISA</option>
                <option value="mastercard">Master Card</option> 
                <option value="Discover">Discover</option>  
              </select>
            </div> <br><br>
            
            <div class="col-lg-12">
              Credit Card Number
              <center><input class="form-control" type="text" class="form-control" name="number" id="number" placeholder="Card Number" size="40" maxlength="16"></center>
              <img src="http://static.paylane.com/images/badges/horizontal/visa-mc-amex-jcb.png"> 
            </div> <br><br><br><br><br>

            <div class="col-lg-4">
              Expiry Date (MMYY)
              <center><input class="form-control" type="text" class="form-control" name="exp" id="exp" placeholder="Expiry Date (MMYY)" size="40" maxlength="4"></center>
            </div> <br><br><br><br>

            <div class="col-lg-4">
              Security Code
              <center><input class="form-control" type="text" class="form-control" name="cvv" id="cvv" placeholder="CVV" size="40" maxlength="3"></center>
              <img src="https://secure2.wish.org/assets/images/csc_visamc.png"> 
            </div> <br><br><br><br><br><br><br>   

            <div class="col-lg-12">
              Cardholder Name
              <center><input class="form-control" type="text" class="form-control" name="name" id="name" placeholder="Name on Card" size="40" maxlength="20" value="<?php echo $meetupFrom; ?>"></center>
            </div> <br><br><br>  
 
            <center>
              <input style="margin-top: 50px;" type="submit" value="Submit" name="smt" id="smt" class="btn btn-primary">
            </center>  
          </div>  
        </form>