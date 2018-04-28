<?php
  $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/classes/User.php');
   $usr = new User();
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name       = $_POST['name'];
        $email      = $_POST['email'];
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $confirm    = $_POST['confirm'];
        
          
        $userregi = $usr->userRegistration($name, $email, $username, $password, $confirm);
   }
   
?>