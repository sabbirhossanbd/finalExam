<?php include 'inc/header.php'; ?>


          <?php 
           Session::checklogin();
          ?>
       

    
     <div class="loginBoxx">
         <div class="jumbotron">
        <h2>Sign Up Here</h2>
        <form action="" method="post">
          <div class="form-group">
            <label>Your Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" />
            </div>
            <div class="form-group">
            <p>Your Email</p>
            <input type="text" name="email" class="form-control" id="email" placeholder="Example@gmail.com" />
            </div>
            <div class="form-group">
            <p>Your User Name</p>
            <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username" />
            </div>
            <div class="form-group">
            <p>Enter Password</p>
            <input type="password" name="password" class="form-control" id="password" placeholder="*********" />
            </div>
            <div class="form-group">
            <p>Retype Password</p>
            <input type="password" name="confirm" class="form-control" id="confirm" placeholder="*********" />
             </div>
            <button type="submit" id="regsubmit" class="btn btn-success"> Register </button>
             <span id="state"></span>
            <h4>Already Registered? <a href="index.php">Login</a></h4>
             
            
        </form>
        </div>
    </div>
  

      
      
<?php include 'inc/footer.php'; ?>       
  
    
