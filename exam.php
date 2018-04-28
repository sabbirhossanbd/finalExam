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
	  	    <a href="startEngtest.php"><button class="btn btn-info">English Quiz</button></a>
	  		<a href="startCiviltest.php"><button class="btn btn-info">Civil Quiz</button></a><br><br>
	  		<a href="starttest.php"><button class="btn btn-info circle">Math Quiz</button></a>
	  		<a href="startCsetest.php"><button class="btn btn-info">Computer Quiz</button></a><br><br>
	  		<a href="startElectrotest.php"><button class="btn btn-info">Electronics Quiz</button></a>
	  		<a href="startEEEtest.php"><button class="btn btn-info">Electrical Quiz</button></a><br><br>
	  		<a href="startAgritest.php"><button class="btn btn-info">Agricultural Quiz</button></a>
	  		<a href="startMectest.php"><button class="btn btn-info">Mechanical Quiz</button></a>
	  	    </div>
	  </div>
</div>
</div>
<?php include_once 'inc/footer.php'; ?>