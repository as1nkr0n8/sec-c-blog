    <?php
	session_start();
	if (isset($_SESSION["uid"]))
    {
		if($_SESSION["admin"]==0)
			$user = "Blogger";
		elseif($_SESSION["admin"]==1)
			$user = "Admin";
		echo"<script type='text/javascript'>
				alert('You're already logged in $user!! Redirecting you.....');
			</script>";
		if($_SESSION["admin"]==0)
		{
			echo"<script type='text/javascript'>
			window.location.href='../bloger.php';
			</script>";
		}														
		elseif($_SESSION["admin"]==1)
		{
			echo"<script type='text/javascript'>
			window.location.href='../admin.php';
			</script>";
		}	
		
    }
    $result="";
    if(isset($_POST["login"]))
    {		
       $ids=$_POST["lemail"];
       $psswd=$_POST["lpass"];
       if($psswd==NULL||$ids==NULL)
       {
          $result="Please fill all details!!!";
       }
	   else
	   {
			$flag=0;			
			$data=mysqli_connect("localhost","root","","drogon") or die();
			$db=mysqli_query($data,"SELECT `emailid` FROM login");
			foreach ($db as $id) 
			{
				if($id['emailid']==$ids)
				{
					$flag=1;
					break;
				}
			}	
			if($flag==1)
			{
				$db=mysqli_query($data,"SELECT `pswd` FROM login WHERE `emailid`='$ids'");
				$db=mysqli_fetch_assoc($db);										
				if($db["pswd"]==md5($psswd))
				{
					echo "<script type='text/javascript'>alert('Launda approved hai');</script>";
					$dc=mysqli_query($data,"SELECT `admin` FROM login WHERE `emailid`='$ids'");
					$dc=mysqli_fetch_assoc($dc);
					if($dc["admin"]==1)
					{						
						echo "<script type='text/javascript'>alert('Launda admin hai');</script>";						
						$_SESSION["uid"] = $ids;
						$_SESSION["admin"] = 1;
						header("location:../admin.php");
					}
					else
					{
						echo "<script type='text/javascript'>alert('Launda chodu hai');</script>";
						$_SESSION["uid"] = $ids;
						$_SESSION["admin"] = 0;
						header("location:../bloger.php");
					}
				}
				else
				{
					$result="Email or Password Incorrect!";
				}
			}
			else
			{
				$result="Email or Password Incorrect!";
			}
		}
	}
	
    ?>







<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css?version=1001">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/style.css">  
</head>

<body>
  
<!-- Mixins-->
<!-- Blog Title-->
<div class="pen-title">
  <h1>Blog Login</h1>
</div>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form method="post">
      <div class="input-container">
        <input type="text" name="lemail" required="required"/>
        <label for="#{label}">Email</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="lpass" required="required"/>
        <label for="#{label}">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container" name="login" value="login">
        <button type="submit" name="login">Login</button>
      </div>
	  <div class="footer"><?php echo $result; ?></div>
    </form>
  </div>
  <div class="card alt">
    <div class="toggle" value="Register"></div>
    <h1 class="title">Register
      <div class="close"></div>
    </h1>
    <form method="post" action="new.php">
      <div class="input-container">
        <input type="text" name="remail" required="required"/>
        <label>Email</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="rpass" required="required"/>
        <label>Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="rrpass" required="required"/>
        <label>Repeat Password</label>
        <div class="bar"></div>
      </div>
	  <div class="input-container">
        <input type="text" name="fname" required="required"/>
        <label>First Name</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" name="lname" required="required"/>
        <label>Last Name</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" name="phone" size="10" required="required"/>
        <label>Phone</label>
        <div class="bar"></div>
      </div>
	  <div class="footer"><?php echo $result; ?></div>
      <div class="button-container" name="signup" value="login">
        <button type="submit" name="signup">Register</button>
      </div>
    </form>
  </div>
</div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
