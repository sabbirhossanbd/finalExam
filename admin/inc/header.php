<?php
  include_once("../lib/Session.php");
  Session::checkAdminSession();
  include_once("../lib/Database.php");
  include_once("../helpers/Format.php");
  
  $db = new Database();
  $fm = new Format();
?>

<!DOCTYPE html>
<html>
<head>
	<title>OES Admin Work Station</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	  <link rel="stylesheet" type="text/css" href="css/admin.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
 </head>
  
 <body>
  <?php
   if(isset($_GET['action']) && $_GET['action'] == 'logout'){
     Session::destroy();
     header("Location:login.php");
     exit();
   }
  ?>
 	<nav class="navbar navbar-inverse">
 		<div class="container-fluid">
 			<div class="navbar-header">
 				<a class="navbar-brand" href="#">OES</a>
 			</div>
 			<ul class="nav navbar-nav">
 				<li class="active"><a href="index.php">Home</a></li>
 				<li><a href="users.php">Manage User</a></li>
          <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add Question <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="addQuestion.php">Math Question</a></li>
                  <li><a href="english.php">Eng Question</a></li>
                   <li><a href="cse.php">Cse Question</a></li>
                  <li><a href="civil.php">Civil Question</a></li>
                  <li><a href="eee.php">EEE Question</a></li>
                  <li><a href="ele.php">Electronics Question</a></li>
                  <li><a href="mec.php">Mechnical Question</a></li>
                  <li><a href="agri.php">Agriculture Question</a></li>
                </ul>
              </li>
          <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entered Question List  <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="questionlist.php">Math Question List</a></li>
                  <li><a href="engquestionlist.php">Eng Question List</a></li>
                   <li><a href="csequestionlist.php">Cse Question List</a></li>
                  <li><a href="civilquestionlist.php">Civil Question List</a></li>
                  <li><a href="eeequestionlist.php">EEE Question List</a></li>
                  <li><a href="elequestionlist.php">Electronics Question List</a></li>
                  <li><a href="mecquestionlist.php">Mechnical Question List</a></li>
                  <li><a href="agriquestionlist.php">Agriculture Question List</a></li>
                </ul>
              </li>
 				
 				<li><a href="?action=logout" >Logout</a></li>
 			</ul>
 		</div>
 	</nav>
	


	
		
		