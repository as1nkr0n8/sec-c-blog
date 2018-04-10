<?php 
session_start();
  if (!isset($_SESSION["uid"]) || $_SESSION["admin"]==1)
   {
      header("location: php/admin/busted.php");
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>SEC(C) Blog</title>

 
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>


    <link href="css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top" class="index">

    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">

            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">WELCOME BLOGGER</a>
            </div>

  
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Features</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">Team</a>
                    </li>

                    <li>
                        <a class="page-scroll" href="php/admin/logout.php">LogOut</a>
                    </li>
                </ul>
            </div>
          
        </div>
   
    </nav>

    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To SEC(C) Blogs!!</div>
                <div class="intro-heading">It's Nice To Meet You</div>
                <a href="#portfolio" class="page-scroll btn btn-xl">Tell Me More</a>
            </div>
        </div>
    </header>

    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Features</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="php/admin/blog.php" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/roundicons2.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>BLOGS</h4>
                        <p class="text-muted">See People's Idea.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="php/admin/create.php" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/create.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>CREATE BLOGS</h4>
                        <p class="text-muted">Write Your Ideas.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">				
                    <a href="php/admin/info.php" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/yours.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>YOUR DETAILS</h4>
                        <p class="text-muted">See Your Personal Info and Blogs.</p>
                    </div>
                </div>
                </div>
                </div>
    </section>

  
    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="col-sm-4">
                    <div class="team-member">
                        
                    </div>
                </div>
            
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/2.jpg" class="img-responsive img-circle" alt="">
                        <h4>as1nkr0n8</h4>
                        <p class="text-muted">LEAD DESIGNER AND DEVELOPER</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="https://twitter.com/alkeshgamer"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="https://www.facebook.com/alkeshgamer"><i class="fa fa-facebook"></i></a>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        
                    </div>
                </div>
                
                
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">Pure dedication in ctrl-c ctrl-v along with custom editing.</p>
                </div>
            </div>
        </div>
    </section>

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

   

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>

</body>

</html>
