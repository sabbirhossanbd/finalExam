<?php include 'inc/header.php'; ?>
  <?php
   Session::checkSession();
  ?>
  <?php
   Session::checkSession();
   $question = $exm->getQuestion();
   $total = $exm->getTotalRows();
  ?>
   <style>
  .starttest{width:500px;margin:0 auto;border:1px solid #FF5733;padding: 20PX;}
   </style>
<div class="main-exam">
  <div class="jumbotron">
	<h2>You are Done!!</h2>
	  <div class="starttest">
	  	<h2>Congrats ! You have just completed the test.</h2>
	  	 <h2>Final Score : <?php
                if(isset($_SESSION['score'])){
                	echo $_SESSION['score'];
                	unset ($_SESSION['score']);
                  
                }
            ?> 
	  	</h2>


	  	<a class="btn btn-success" href="viewans.php">View Answer</a>
	  	<a class="btn btn-info" href="exam.php">Start Again</a>
	  </div>
	  
</div>
</div>

<?php include_once 'inc/footer.php'; ?>