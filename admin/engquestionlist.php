<?php

  include_once('inc/header.php');
  include_once('../classes/Exam.php');
  $exm = new Exam();
  
?>
 <?php
   if (isset($_GET['remque'])) {
   	$quest = (int)$_GET['remque'];
   	$removeqq =$exm->delEngQuestion($quest);
   }
 ?>


 <div class="main">
 	<h2>Admin Panel - Question List.</h2>
   <?php
    if(isset($removeqq)){
        echo $removeqq;
     }
   ?>

 	<div class="question">
 		<table class="tblone">
		       <tr>
			       	<th width="10%"> No </th>
			       	<th width="70%"> Question </th>
			       	<th width="20%"> Action </th>
		       </tr>
	<?php 
       $getData = $exm->getEngQueByOrder();
       if ($getData) {
       	$i=0;
       	while ($result = $getData->fetch_assoc()) {
       		$i++;
      	
	?>	
		       <tr>
			       	<td><?php echo $i; ?></td>
			        <td><?php echo $result['ques']; ?></td>
			       	<td>
			       	<a onclick="return confirm('Are you sure to remove?')" href="
			       	?remque= <?php echo $result['questionid']; ?>">Remove</a>
			       	</td>
		       </tr>			
		<?php } } ?>	
		 
 		</table>
 	</div>
 </div>