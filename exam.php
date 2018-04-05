<?php include_once 'inc/header.php'; ?>
  <?php
   Session::checkSession();
  ?>
<div class="main-exam">
	<div class="jumbotron">
	<h2>Welcome to online Exam</h2>
	<h2>Please select the subject !!</h2>
	  
	 
	  <div class="segment">
	  	<h2>Start Test</h2>
	  	    <div class="str">
	  		<a href="starttest.php"><button>Math Quiz</button></a>
	  		<a href="startCsetest.php"><button>Computer Quiz</button></a>
	  		<a href="startEngtest.php"><button>English Quiz</button></a>
	  	    </div>
	  </div>
</div>
</div>
<?php include_once 'inc/footer.php'; ?>