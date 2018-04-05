<?php include 'inc/header.php';?>
<?php 
  Session::checkSession();
    if(isset($_GET['q'])){
    	$number = (int)$_GET['q'];
    }else{
    	header("Location:exam.php");
    }
    $total = $exm->getCseTotalRows();
    $question = $exm->getCseQuesByNumber($number);
   
?>
<?php 
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
  	 $process =  $pro->cseProcessData($_POST);

  }
?>

<script type="text/javascript">
 	          function timeout(){
 		         var minute =  Math.floor(timeleft/60);
 		         var second =  timeleft%60;

 		
 		       if(timeleft <= 0){
 		 	
               clearTimeout(tim);
                 
                 alert("Time up!");
                 document.forms[0].submit.click();

                    }
 		       
 		      document.getElementById("time").innerHTML = minute+":"+second;
                
           timeleft--;
 		  var tim = window.setTimeout(function(){timeout()},1000);
 	    }
 	
 	
 </script>
  <style> .sab{color: #9AC11E;  } </style>
 <body onload="timeout();">
    
   

<div class="main-exam" >
	<div id="time" style="float: right;">Timeout</div>
	   <script type="text/javascript">
	   	var timeleft = 1*20;
	   </script>
	<h2 class="sab">Question <?php echo $question['questionid']; ?> of <?php echo $total; ?></h2>
	  <div class="test">
	  	<form method="post" action="" name="form1" >

           

	  		<table>
	  			<tr>
	  				<td colspan="2">
	  					<h3>Que <?php echo $question['questionid']; ?> : <?php echo $question['ques']; ?></h3>
	  				</td>
	  			</tr>
                  <?php
                    $answer = $exm->getCseAnswer($number);
                    if($answer){
                    	while ($result = $answer->fetch_assoc()) {
                    		
                    
                  ?>
	  			<tr>
	  				<td>
	  					<input type="radio" name="ans" value="<?php echo $result['ansid']; ?>" /><?php echo $result['ans']; ?>
	  				</td>
	  			</tr>
	  			<?php 	} } ?>
	  			<tr>
	  				<td>
	  					<input type="submit" id="submit" name="submit" value="Next Question" />
	  					<input type="hidden" name="number" value="<?php echo $number; ?>" />
	  				</td>
	  			</tr>
	  			
	  		</table>
	  	</form>
	  </div>
</div>
</body>

<?php include_once 'inc/footer.php'; ?>

