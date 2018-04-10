<?php
    $result="";
	if(isset($_POST["signup"]))
	{	
		$flag=0;
		$uid=$_POST["remail"];
		$passwd=$_POST["rpass"];
		$rpasswd=$_POST["rrpass"];
		$fnam=$_POST["fname"];
		$lnam=$_POST["lname"];
		$mob=$_POST["phone"];	
		if($passwd!=$rpasswd)
		{
			$result="Passwords don't match, enter again";
			header("location:index.php");
		}
		else
		{
			$data=mysqli_connect("localhost","root","","drogon") or die();
			$db=mysqli_query($data,"SELECT `emailid` FROM login");
			foreach ($db as $id)
			{
				$a=$id['emailid'];
				if($a==$uid)
				{
					$flag=1;
					break;
				}
			}  
			if($flag==1)
			{               
				$result="User id Is Already Registered!!";
			}
			if($flag==0)
			{					
				$lol=mysqli_query($data,"INSERT INTO login(emailid,pswd,fname,lname,mobno) VALUES('$uid',MD5('$passwd'),'$fnam','$lnam','$mob')");
				if(!$lol)
				{
					$al=mysqli_error($data);					
					
				}
				header("location:index.php");
			}
		}

	}
?>