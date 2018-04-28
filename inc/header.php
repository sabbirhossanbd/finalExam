
<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../lib/Session.php');
    Session::init();
  include_once ($filepath.'/../lib/Database.php');
  include_once ($filepath.'/../helpers/Format.php');
  

  spl_autoload_register(function($class){
    include_once "classes/".$class.".php";
  });
    $db = new Database();
    $fm = new Format();
    $usr = new User();
    $exm = new Exam();
    $pro = new Process();
    
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <title>Online Examination Management System</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/main.js"></script>

  </head>

  <body>

    <?php
   if(isset($_GET['action']) && $_GET['action'] == 'logout'){
     Session::destroy();
     header("Location:index.php");
     exit();
    }
   ?>

    <div class="container">
        <h3 class="text-muted">OEMS</h3>
          
      <header class="header clearfix">
          <?php 
            $login = Session::get("login");
            if($login == true){ 
          ?>
          
          <span class="well">
                Welcome <strong><?php echo Session::get("name"); ?></strong>
            </span>
            
          <?php } ?>
        
        <nav>

         
          <ul class="nav nav-pills float-right">
            
            <?php 
              $login = Session::get("login");
              if($login == true){ 
            ?>
             
             <li class="nav-item">
              <a class="nav-link" href="profile.php">Profile</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="exam.php">Exam</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="?action=logout">Logout</a>
            </li>
            
              <?php } else { ?>

            <li class="nav-item">
              <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>   
        </nav>

         <?php } ?>

         
         

      </header>
      