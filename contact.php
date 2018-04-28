<?php include 'inc/header.php'; ?>

          <?php 
           Session::checklogin();
          ?>
       

    
     <div class="loginBoxx">
         <div class="jumbotron">
        <h2>Please Fill up this Form</h2>
        <form action="contactform.php" method="post">
          <div class="form-group">
            <label>Your Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" />
            </div>
            <div class="form-group">
            <p>Your Email</p>
            <input type="text" name="email" class="form-control" id="email" placeholder="Example@gmail.com" />
            </div>
            <div class="form-group">
            <p>Subject</p>
            <input type="text" name="subject" class="form-control" id="subject" />
            </div>
            <div class="form-group">
            <p>Your Message</p>
             <textarea class="form-control" name="message" id="message" rows="6"></textarea>
            </div>
            <button type="submit" name="formsubmit" id="formsubmit" class="btn btn-success"> Submit</button>
             <span id="state"></span>
           
             </div>
            
           
             
            
        </form>
        </div>
    </div>
  

      
      
<?php include 'inc/footer.php'; ?>       
  
    
