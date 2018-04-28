
<?php include 'inc/header.php'; ?>

 
 <?php
  
   if(isset($_POST['reset'])){
        
        $email    = $_POST['email'];
        $username = $_POST['username'];
        $password = md5($_POST['new_pass']);
        
        $updatepass = $usr->resetPassword($email, $username, $password);
   }

   
?>
     
 

      <main role="main">

        <div class="jumbotron">
          <h3>Reset Your Password</h3>
          <div style="max-width: 600px; margin: 0 auto">
          <form action="" method="post">
            <div class="form-group">
              <label>Enter Your Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com" />
              </div>
               <div class="form-group">
              <label>Enter Your Username</label>
              <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" />
              </div>
              <div class="form-group">
              <label>Enter New password</label>
              <input type="password" class="form-control" name="new_pass" id="new_pass" placeholder="*********" />
              </div>

              <button type="submit" class="btn btn-success" name="reset" id="resetsubmit">Reset Password</button>

            </form>
             </div>
        </div>

        <div class="row marketing">
          <div class="col-lg-6">
            
        </div>

      </main>

     <?php include 'inc/footer.php'; ?>