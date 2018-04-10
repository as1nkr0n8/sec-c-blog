<?php
	session_start();
	if (!isset($_SESSION["uid"]))
	{
		$loggedin = 0;
		$link='../../index.php';
	}
	else
	{
		$loggedin = 1;
		$admin=$_SESSION["admin"];
		if($admin)
			$link='../../admin.php';
		else
			$link='../../bloger.php';
	}		
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blogs</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="../../css/agency.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->

</head>

<body id="page-top" style="background-color:#ED2553" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
					<?php echo"
                        <a class='page-scroll' href='$link'>Home</a>";
						?>
                    </li> 
					<?php					
					if($loggedin){ echo"
					<li>
                        <a class='page-scroll' href='logout.php'>LogOut</a>
                    </li>";}?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
<br><br><br><br>


    <div >
        <div class="modal-dialog">
            <div class="modal-content">
                
               
                            <div class="modal-body">
                                <h1 style="text-align:center">BLOGS</h1>                                
							</div>
						</div><br>
                                <?php
                                    $d=array();
                                    $data=mysqli_connect("localhost","root","","drogon") or die();
                                    $m=0;
                                       
                                            $db=mysqli_query($data,"SELECT `pid` FROM post WHERE `permission`='1'");
                                            foreach ($db as $key) {
                                                $d[$m]=$key['pid'];

                                                $m++;
                                            }
                                            sort($d);
                                       
                                        for($j=($m-1);$j>=0;$j--)
                                        { 
                                            $db=mysqli_query($data,"SELECT `uid`,`pid`,`content`,`title`,`category`,`time`,`name` FROM post WHERE `pid`='$d[$j]'");
                                            $db=mysqli_fetch_assoc($db);
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
												echo "
												<form id='form1' action='info.php' method='post'>
												<div>By: <a href='javascript:;' onclick='document.getElementById('form1').submit();'><b>$fn</b></a></div>
												<input type='hidden' name='userid' value='$userid'/>
												</form>";
                                                //echo "<div >By: <a href='info.php'><b>$fn</b></a></div><br>";
												echo "<pre row='3' style='white-space: pre-wrap; word-break:keep-all'>$cn</pre>";										
												echo "<a href='php/admin/post.php?pid=$peid' target='_blank'>Read More...</a>";												
                                                echo "</div></div><br><br>";												
                                        }
                                ?>                                
        </div>
    </div>

    <!-- Clients Aside -->
    <aside class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="" class="img-responsive img-centered" alt="">
                    </a>
                </div>
            </div>
        </div>
    </aside>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; SEC(C) Blogs</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="https://twitter.com/alkeshgamer"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/alkeshgamer"><i class="fa fa-facebook"></i></a>
                        </li>                       
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

   
    <script src="vendor/jquery/jquery.min.js"></script>

    
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

  
    <script src="js/agency.min.js"></script>

</body>

</html>