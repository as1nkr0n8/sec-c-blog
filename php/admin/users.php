<?php 
session_start();
  if (!isset($_SESSION["uid"]) || $_SESSION["admin"]==0)
   {
      header("location: busted.php");
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

 <title>Users</title>

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
							
							<h1>Users</h1>
                                <br>
                                <?php
                                    $data=mysqli_connect("localhost","root","","drogon") or die();
									$key=mysqli_query($data,"SELECT `emailid`,`fname`,`lname`,`mobno`,`admin` FROM login");
									foreach ($key as $db) 
									{										
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
										echo "<div>";
										echo "<div><h4>$fn $ln</h4></div>";
										echo "<div><b><i>$admn</i></b></div>";
										echo "<div>Email ID: $email</div>";
										echo "<div>Phone: $mob</div>";
										echo "</div><br>";
									}                                       
                                ?>                                                                                       
                            </div>
                        
            </div>
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