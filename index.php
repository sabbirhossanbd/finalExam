
<?php include 'inc/header.php'; ?>

      <main role="main">

        <div class="jumbotron">
          <h3>Student Login</h3>
          <div style="max-width: 600px; margin: 0 auto">
          <form action="" method="post">
            <div class="form-group">
          
              <label>Enter Your Email</label>
              <input type="text" class="form-control" name="email" id="email" placeholder="Example@gmail.com" />

              </div>
              <div class="form-group">
              <label>Enter Your password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="*********" />
              </div>

              <button type="submit" class="btn btn-success" name="login" id="loginsubmit">Login</button>

              <h5><a href="reset.php">Forgot Password</a></h5>

              <h5>New User? <a href="register.php">signup</a> free</h5>

              <span class="empty" style="display: none">Field Must Not Be Empty!</span>
              <span class="error" style="display: none">Email or Password Not Matched!</span>
              <span class="disable" style="display: none">User Id Disabled!</span>
            </form>
             </div>
        </div>

        <div class="row marketing">
          <div class="col-lg-6">
            
        </div>

      </main>

     <?php include 'inc/footer.php'; ?>