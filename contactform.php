<?php
  if(isset($_POST['formsubmit'])){
  	 $name = $_POST['name'];
  	 $email = $_POST['email'];
  	 $subject = $_POST['subject'];
  	 $message = $_POST['message'];

     $mailTo  = "sabbirhossan115@gmail.com";
     $headers = "From: ".$email;
     $txt = "You have received an email from ".$name.".\n\n".$message; 

  	 mail($mailTo, $subject ,  $txt);
  	 header("Location: index.php?mailsend");
  }

?>