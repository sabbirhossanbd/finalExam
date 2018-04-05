<?php

  include_once('inc/header.php');
  include_once('../classes/User.php');
  $usr = new User();
  
?>
<?php
  if(isset($_GET['dis'])){
  	 $dblid = (int)$_GET['dis'];
  	 $dbluser = $usr->disableUser($dblid);
  }
  if(isset($_GET['ena'])){
  	$eblid = (int)$_GET['ena'];
  	$ebluser = $usr->enableUser($eblid);
  }
   if(isset($_GET['rem'])){
  	$remlid = (int)$_GET['rem'];
  	$remluser = $usr->deleteUser($remlid);
  }
?>
 <div class="main">
 	<h2>Admin Panel - Manage User.</h2>
 	<?php
      if(isset($dbluser)){
      	echo $dbluser;
      }
      if(isset($ebluser)){
      	echo $ebluser;
      }
      if(isset($remluser)){
      	echo $remluser;
      }
 	?>
 	<div class="manageuser">
 		<table class="tblone">
		       <tr>
			       	<th> No </th>
			       	<th> Name </th>
			       	<th> Username </th>
			       	<th> email </th>
			       	<th> Action </th>
		       </tr>
	<?php 
       $userData = $usr->getAllUser();
       if ($userData) {
       	$i=0;
       	while ($result = $userData->fetch_assoc()) {
       		$i++;
       	
	?>	
		       <tr>
			       	<td> 
			       		<?php
                           if($result['status'] == '1'){
                           	 echo "<span class='error'>".$i."</span>";
                           }else{
                           	echo $i;
                           }  
			       		 ?>
			       			
			       		</td>
			       	<td><?php echo $result['name']; ?></td>
			        <td><?php echo $result['username']; ?></td>
			       	<td><?php echo $result['email']; ?></td>
			       	<td>
			       		<?php if($result['status'] == '0') { ?>
			       	<a onclick="return confirm('Are you sure to disable?')" href="
			       	?dis= <?php echo $result['userid']; ?>">Disable</a>
			       	<?php } else { ?>
			       	<a onclick="return confirm('Are you sure to enable?')" href="
			       	?ena= <?php echo $result['userid']; ?>">Enable</a>
			       	<?php } ?>
			       	|| <a onclick="return confirm('Are you sure to remove?')" href="
			       	?rem= <?php echo $result['userid']; ?>">Remove</a>
			       	</td>
		       </tr>			
		<?php } } ?>	
		 
 		</table>
 	</div>
 </div>