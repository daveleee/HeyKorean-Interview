<!DOCTYPE html>
<html>
<head>
	<title>Login Window</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
    
</head>
<body>  
	<br><br><br>
	<center> <h1 style="font-size: 30px;">Sign in to Hey Korean Prototype</h1> </center>
	<br><br><br>
        <div class="container">
 
            <form action='loginCheck.php' method='post' style="text-align: center;">
              <div class="form-group"> 
                <center><input style="width: 40%;" type="text" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email Address"></center>
              </div>
              <div class="form-group"> 
                <center><input style="width: 40%;" type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password"></center>
              </div>
              <button type="submit" id="login" style="margin-top: 20px; background: none; border: none;">
              	로그인
              </button>  
            </form>

        </div> 
</body>
</html>




