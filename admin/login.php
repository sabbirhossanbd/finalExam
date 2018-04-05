<?php 
  $filepath = realpath(dirname(__FILE__));
  include_once($filepath.'/inc/loginheader.php');
  include_once($filepath.'/../classes/Admin.php');
   $ad = new Admin();
      
 ?>
 <?php
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $adminData = $ad->getAdminData($_POST);
   }
 ?>

   <body class="sabbir">
   <h2 class="ret"><i>Admin Login</i></h2>
   <form action="" method="post">
     <div class="imgcontainer">
     	<img src="img/Admin.png" alt="Avatar" class="avatar">
     </div>
     <div class="container">
     	<label><b>Username</b></label>
     	<input type="text" name="adminUser" placeholder="Enter Username" required="1"/>

     	<label><b>Password</b></label>
     	<input type="Password" name="adminPass" placeholder="Enter Password" required="" />
     	<button type="submit" >Login</button>
     	<input type="checkbox" name="checked">Remember me
     </div>`
      <div>
        
      </div>
       <?php
            if(isset($adminData)){
              echo $adminData;
            }
       ?>
  	</form>

  	
  	<?php include 'inc/footer.php'; ?>
