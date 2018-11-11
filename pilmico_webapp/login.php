

<!DOCTYPE html>
<html>
<head>
	<title>Pilmico Login</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1"/>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link href="image/M_icon.png" rel="icon" />
	<link rel="stylesheet" href="css/Bootstrap.css"/>
	<link rel="stylesheet" href="css/admin.css"/>
</head>
<body style='font-family: "Open Sans", sans-serif;background-color: #3DBADA;'>

<form action="login.php" class="custom-form" method="post" c>
	<?php
	session_start();
	if (isset($_SESSION['type'])) {
		if ($_SESSION['type'] == 'Order') {
        	header('Location: index.php');
        }
	}

    include('conn.php');
	if (isset($_POST['user']) && isset($_POST['pass'])) {
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$query = "Select * from account where user = '".$user."' and pass = '".$pass."'";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {  
	          	$id=$row["ID"];  
	          	$name=$row["name"];
	          	$type=$row["type"];       
	            session_start();
	            $_SESSION['id'] = $id;	            
	            $_SESSION['user'] = $user;
	           	$_SESSION['pass'] = $pass;
	            $_SESSION['name'] = $name;
	            $_SESSION['type'] = $type;
	            if ($type == 'Order') {
	            	header('Location: index.php');
	            }
	            else if ($type == 'Production') {
	            	header('Location: production.php');
	            }
	            else if ($type == 'RM Issuance') {
	            	header('Location: rm_issuance.php');
	            }
	            else if ($type == 'Admin') {
	            	header('Location: admin.php');
	            }
	            
            }
        }
        else{?>
        	<div class="highL">
		 		<h5 class="text-center"><b style="font-size: 20px;">&#8856;</b> &nbspLogin failed, wrong username or password!</h5>
		 	</div>
		 	<div style="width: 100%;height: 25px;display: inline-block;"></div>	
        <?php
    	}
		
	}
	

 ?>
	<div class="divImg">
		<img src="image/icon.png" class="imgLogin">
		<img src="image/pilmico_logo.png" class="imgLogin">
	</div>
	<br>
	<div class="form-group">
		<input type="text"  class="form-control" name="user"  id="user" ng-model="userName" placeholder="Username" required/>
		<label for="user" class="animated-label"></label>
	</div>
	<div class="form-group">
		<input type="password" class="form-control" name="pass"  id="pass" placeholder="Password" required/>
		<label for="pass" class="animated-label"></label>
	</div>
	<div class="submit">
		<button class="btn btn-primary btn-block " style="background-color: #3DBADA;border:none;">Login</button>
	</div>
		<br>
</form>
	
	<h5 class="text-center">Copyright © 2018 Pilmico Login Form.</h5>
</body>
</html>

</body>
</html>