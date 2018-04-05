 <?php include 'inc/header.php'; ?>
 <?php 
   Session::checkSession();
   $userid = Session::get("userid");
 ?>
  <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $updateuser = $usr->updateUserData($userid, $_POST);
   }

  ?>

 <div class="main-exam">

  <div class="jumbotron">
     <?php 
             if (isset($updateuser)) {
              echo $updateuser;
             }
    ?> 
    
  <h2>Your Profile!!</h2>
  <div class="profile">
   
  <form action="" method="post">
    <?php
    $getData = $usr->getUserData($userid);
    if($getData){
      $result = $getData->fetch_assoc();
    
  ?>
       <div class="form-group">
         
          <label>Name</label>
         <input type="text" class="form-control" name="name" value="<?php echo $result['name']; ?>" />
          </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control" value="<?php echo $result['username']; ?>" />
          </div>
        <div class="form-group">
          <label>Email</label>
         <input type="text" name="email" class="form-control" value="<?php echo $result['email']; ?>" />
         </div>
         <div class="form-group">
          <td></td>
          <td><button type="submit" class="btn btn-success">Update</button></td>
         </div>
       <?php } ?>
  </form>
 </div>
 </div>
 </div>
 <?php include_once 'inc/footer.php'; ?>

 