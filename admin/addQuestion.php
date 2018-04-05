 
<?php
  $filepath = realpath(dirname(__FILE__));
  include_once($filepath.'/inc/header.php');
  include_once ($filepath.'/../classes/Exam.php');
  $exm = new Exam();

?>
  <?php
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
         $addQue = $exm->addQuestion($_POST); 
   	   }
   	   //Get Total
   	   $total = $exm->getTotalRows();
   	   $next = $total+1;
  ?>
 
  <div class="main">
  	<h1>Admin Panel - Add Question</h1>
     <?php
      if(isset($addQue)){
        echo $addQue;
      }
     ?>

  	  <div class="adminpanel">
  	  	<form action="" method="post">
  	  		<table>
  	  			<tr>
  	  			<td><b>Question no</b></td>
  	  			<td>:</td>
  	  			<td><input type="number" value="<?php
                       if(isset($next)){
                       	echo $next;
                       }
                      ?>" name="questionid" /></td>
  	  			</tr>

  	  			<tr>
  	  			<td><b>Question</b></td>
  	  			<td>:</td>
  	  			<td><input type="text" name="ques" placeholder="Enter Question" required="1" /></td>
  	  			</tr>

  	  			<tr>
  	  			<td><b>Choice One</b></td>
  	  			<td>:</td>
  	  			<td><input type="text" name="ans1" placeholder="Enter choice one" required="1" /></td>
  	  			</tr>
  	  			<tr>
  	  			<td><b>Choice Two</b></td>
  	  			<td>:</td>
  	  			<td><input type="text" name="ans2" placeholder="Enter choice two" required="1" /></td>
  	  			</tr>

                <tr>
  	  			<td><b>Choice Three</b></td>
  	  			<td>:</td>
  	  			<td><input type="text" name="ans3" placeholder="Enter choice three" required="1" /></td>
  	  			</tr>
                <tr>
  	  			<td><b>Choice Four</b></td>
  	  			<td>:</td>
  	  			<td><input type="text" name="ans4" placeholder="Enter choice four" required="1" /></td>
  	  			</tr>
                <tr>
  	  			<td><b>Correct No</b></td>
  	  			<td>:</td>
  	  			<td><input type="number" name="rightans"  required /></td>
  	  			</tr>
  	  			<tr>
  	  			
  	  			<td colspan="3" align="center">
  	  				<input type="submit" value="Add A Question" />
  	  			</td>
  	  			</tr>
  	  		</table>
    	</form>
  	  </div>
  </div>
<?php
  
?>
		
<?php include 'inc/footer.php';?>