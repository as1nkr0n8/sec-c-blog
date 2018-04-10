<?php
	session_start();
	if (!isset($_SESSION["uid"]))
	{
		$loggedin = 0;
	}
	else
		$loggedin = 1;
	$postid = $_GET['pid'];
	$useid = $_GET['uid'];
	$data=mysqli_connect("localhost","root","","drogon") or die();
	if(isset($_POST["submit"]) && $loggedin)
	{	
		$comment=$_POST['comment'];
		$time=time();
		$id=$_SESSION["uid"];
		$temp=mysqli_query($data,"INSERT INTO comments(`pid`,`cont`,`uid`,`ctime`) VALUES('$postid','$comment','$id','$time')");
		if($temp)
		{
			header("location:post.php?pid=$postid");
		}
		else
			echo "Not working". mysqli_error($data);
	}
	
?>
<!DOCTYPE html>
   <html>
   <head>
      
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 <title>Post</title>

    <link href="../../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">


    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

   
    <link href="../../css/agency.min.css" rel="stylesheet">
   </head>
   <body style="background-color:#ED2553">
   <div  >
        <div class="modal-dialog">
            <div class="modal-content">
                
               
                            <div class="modal-body">
                                <h1 style="text-align:center">BLOGS</h1>                                
							</div>
						</div><br>
                                <?php  
									$data=mysqli_connect("localhost","root","","drogon") or die();
									$key=mysqli_query($data,"SELECT `uid`,`pid`,`content`,`title`,`category`,`time`,`name` FROM post WHERE `uid`='$useid'");
									foreach($key as $db){
									//$db=mysqli_fetch_assoc($db);
									$userid=$db['uid'];
									$fn=$db['name'];
									$fn=ucfirst($fn);
									$cn=$db['content'];
									$tl=$db['title'];
									$ct=$db['category'];
									$time=$db['time'];
									$userid=strtoupper($userid);
									date_default_timezone_set("Asia/Kolkata");
									$time2=time();
									//echo $time;
									//echo $time2;
									$diff=$time2-$time;
									$df=(int)$diff/3600;
									if($df<1)
									{
										if((int)($diff/60)<2)
										{
											if((int)($diff/60)<1)
											{
												$df="Just Now";
											}
											else
											{
												$df="1 Minute Ago";
											}
										}
										else
										{
											$df=((int)($diff/60))." Minutes Ago";
										}
									}
									elseif($df<24)
									{
										$df=(int)$df." Hours Ago";
									}
									else
									{
										$temp=$df;
										$df = ((int)($df/24))." Days & ".((int)($df%24))." Hours Ago";
									}

                                            
									echo "<div class='modal-content'><div class='modal-body'>";
									echo "<div ><h3>$tl</h3></div>";
									echo "<div >Category : $ct</div>";
									echo "<div >$df</div>";                                                                                               
									echo "<div >By: <b>$fn</b></div><br>";
									echo "<pre style='white-space: pre-wrap; word-break:keep-all'>$cn</pre>";
									echo "</div></div><br><br>";}

									
									if($loggedin)
									{
										echo "<form method='post'>";
										echo "<textarea name='comment' cols='50' rows='3' placeholder='Your comment here'></textarea><br>";
										//echo "<input type='text' rows='3' cols='25' name='comment' placeholder='Enter comment' required='required'/>";
										echo "<button type='submit' name='submit'>Submit</button>";
										echo "</form><br>";
									}									
									
									$key=mysqli_query($data,"SELECT `cid`,`pid`,`cont`,`uid`,`ctime` FROM comments WHERE `pid`=$postid ORDER BY `ctime`");
									if(mysqli_num_rows($key)!=0)
									{
										#echo 'hola bhola';
										echo "<div class='modal-content'><div class='modal-body'>";
										echo "<div><b><i>Comments:</i></b></div><br>";
										foreach ($key as $db) 
										{
											$cont=$db['cont'];
											$userid=$db['uid'];
											$tem=mysqli_query($data,"SELECT `fname` FROM login WHERE `emailid`='$userid'");
											$tem=mysqli_fetch_assoc($tem);
											$userid=$tem['fname'];
											$ctime=$db['ctime'];											
											echo "<div>";
											echo "<div><b>&nbsp;&nbsp;&nbsp;$userid</b></div>";
											echo "<div>&nbsp;&nbsp;&nbsp;&nbsp;$cont</div>";
											echo "</div><br>";
										}
										echo "</div></div>";
									}
									else
									{
										echo "<div class='modal-content'><div class='modal-body'>";
										echo "<div><b><i>&nbsp;&nbsp;No comments</i></b></div>";
										echo "</div></div>";
									}
                                ?>                                
        </div>
    </div>
   
    <script src="../../vendor/jquery/jquery.min.js"></script>

    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

 
    <script src="../../js/jqBootstrapValidation.js"></script>
    <script src="../../js/contact_me.js"></script>

 
    <script src="../../js/agency.min.js"></script>
   </body>
   </html> 