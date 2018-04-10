<?php 
	session_start();
  if (!isset($_SESSION["uid"]))
   {
      header("location: busted.php");
   }
   else
   {
		if(isset($_POST["userid"]))
			$usid=$_POST["userid"];
		else
			$usid=$_SESSION["uid"];
   }
	
?> 

 
 <!DOCTYPE html>
   <html>
   <head>
      
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>Personal Info & Blogs</title>

    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


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
                            <h1 style="text-align:center">YOUR INFO</h1>
							</div>
						</div><br>
                                <br>
                                <?php									
                                    $d=array();
                                    $data=mysqli_connect("localhost","root","","drogon") or die();									
									$db=mysqli_query($data,"SELECT `emailid`,`fname`,`lname`,`mobno`,`admin` FROM login WHERE `emailid`='$usid'");
									$db=mysqli_fetch_assoc($db);
									$email=$db['emailid'];
									$email=strtoupper($email);
									$fn=$db['fname'];
									$fn=ucwords($fn);
									$ln=$db['lname'];
									$ln=ucwords($ln);
									$mob=$db['mobno'];
									$admn=$db['admin'];
									if($admn == 1)
										$admn = "Admin";
									else
										$admn = "Blogger";
									$key=mysqli_query($data,"SELECT `uid`,`pid`,`content`,`title`,`category`,`time`,`name` FROM post WHERE `uid`='$usid' ORDER BY `pid` DESC");
									$tlike=0;
									foreach($key as $db)
									{
										$p=$db['pid'];
										$temp1=mysqli_query($data,"SELECT `lid` FROM `likes` WHERE `pid`='$p'");
										$tlike=$tlike + mysqli_num_rows($temp1);
										
									}
									echo "<div class='modal-content'><div class='modal-body' style='text-align:justify'>";
									echo "<div><h4>$fn $ln</h4></div>";
									echo "<div><b><i>$admn</i></b></div>";
									echo "<div>Email ID: $email</div>";
									echo "<div>Phone: $mob</div>";
									echo "<div>Total Likes: $tlike</div>";
									echo "</div></div><br><br>";
									echo "<div class='modal-content'>
											<div class='modal-body'>
											<h1 style='text-align:center'>YOUR Blogs</h1>
											</div>
											</div><br>";
																											
									if(mysqli_num_rows($key)!=0)
									{
										foreach($key as $db)
										{
										//$db=mysqli_fetch_assoc($db);
										$userid=$db['uid'];
										$fn=$db['name'];
										$fn=ucfirst($fn);
										$cn=$db['content'];
										$peid=$db['pid'];
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
										$r=(int)$diff/3600;
										if($df<1)
										{
											if((int)($diff/60)<2)
											{
												if((int)($diff/60)<1)
												{
													$df="Just Now";
												}
												else{
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
												echo "<pre row='3' style='white-space: pre-wrap; word-break:keep-all; height:100px;overflow: hidden;'>$cn</pre>";
												echo "<a href='post.php?pid=$peid' target='_blank'>Read More...</a>";												
                                                echo "</div></div><br><br>";
                                            
										}
									}										
									else
									{
										echo "<div class='modal-content'><div class='modal-body'>";
										echo "<div><b><i>&nbsp;&nbsp;You have no blogs.</i></b></div>";
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