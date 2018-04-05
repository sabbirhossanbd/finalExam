<?php include 'inc/header.php'; ?>
  <?php
   Session::checkSession();
   $question = $exm->getEngQuestion();
   $total = $exm->getEngTotalRows();
  ?>
  <style>
  	.starttest{
	border: 2px solid #f4f4f4;
	width: 590px;
	padding: 20px;
    margin: 0 auto;
}
.starttest h2{
	border-bottom: 1px solid #ddd;
	font-size: 20px;
	margin-bottom: 10px;
	padding-bottom: 10px;
	text-align: center;
}
.starttest ul{margin: 0;padding: 0;list-style: none;}
.starttest ul li{margin-top: 5px;}
.starttest a{
	background: #f4f4f4 none repeat scroll 0 0;
	border: 1px solid #ddd;
	color: #444;
	display: block;
	margin-top: 10px;
	padding: 6px 10px;
	text-align: center;
	text-decoration: none;
}
.starttest{width:500px;margin:0 auto;border:1px solid #ddd;padding: 20PX;}
  </style>

<div class="main-exam">
	<div class="jumbotron">
	<h2>Welcome to online Exam</h2>
	  <div class="starttest">
	  	<h2>Test your Knowledge</h2>
	  	<strong>This is multiple choice system.</strong>
	  	<ul>
	  		<li><strong>Number of Question : </strong><?php echo $total; ?></li>
	  		<li><strong>Question Type : </strong>Multiple Choice</li>
	  	</ul>
	  	<a class="btn btn-primary" href="engtest.php?q=<?php echo $question['questionid']?>">Start Test</a>
	  </div>
</div>
</div>
<?php include_once 'inc/footer.php'; ?>