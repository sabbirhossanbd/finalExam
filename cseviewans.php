<?php include 'inc/header.php'; ?>
<?php 
  Session::checkSession();
   $total = $exm->getCseTotalRows();
?>
<style>
  .viewans a{
  background: #f4f4f4 none repeat scroll 0 0;
  border: 1px solid #ddd;
  color: #444;
  display: block;
  margin-top: 10px;
  padding: 6px 10px;
  text-align: center;
  text-decoration: none;
}
</style>
<div class="main-views">
  <h2>All Question answer : <?php echo $total; ?></h2>
    <div class="viewans">
    
        <table>
          <?php
                  $getques = $exm->getCseQuebyOrder();
                  if($getques){
                    while ($question = $getques->fetch_assoc()) {
                  
          ?>
          <tr>
            <td colspan="2">
              <h3>Que <?php echo $question['questionid']; ?> : <?php echo $question['ques']; ?></h3>
            </td>
          </tr>
                  <?php
                    $number = $question['questionid'];
                    $answer = $exm->getCseAnswer($number);
                    if($answer){
                      while ($result = $answer->fetch_assoc()) {
                        
                    
                  ?>
          <tr>
            <td>
              <input type="radio"/>
              <?php 
              if ($result['rightans'] == '1') {
                echo "<span style='color:#97f260'>".$result['ans']."</span>";
              }else{
                echo $result['ans'];
              }
              
               ?>
            </td>
          </tr>
          <?php   } } ?>

          <?php } } ?>
          
        </table>
     <a href="startCsetest.php">Start Again</a>
    </div>
</div>

<?php include_once 'inc/footer.php'; ?>
