<?php
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/Database.php');
   include_once ($filepath.'/../helpers/Format.php');

  
  class Exam {
  	private $db;
  	private $fm;
  	
  	function __construct(){
  		$this->db = new Database();
  		$this->fm = new Format();
  		
  }

      /**
       * @param $data
       * @return string
       */
      public function addQuestion($data){
     $questionid = mysqli_real_escape_string($this->db->link, $data['questionid']);
     $ques = mysqli_real_escape_string($this->db->link, $data['ques']);
     $ans = array();
     $ans[1]= $data['ans1'];
     $ans[2]= $data['ans2'];
     $ans[3]= $data['ans3'];
     $ans[4]= $data['ans4'];
     $rightans = $data['rightans'];
     $query = "INSERT INTO tbl_question(questionid, ques) VALUES('$questionid ', '$ques')";
     $insert_row = $this->db->insert($query );
     if($insert_row){
      foreach ($ans as $key => $ansName) {
        if($ansName != ''){
          if($rightans == $key){
            $rquery = "INSERT INTO tbl_answer(questionid, rightans, ans) VALUES('$questionid', '1', '$ansName')";
          }else{
            $rquery = "INSERT INTO tbl_answer(questionid, rightans, ans) VALUES('$questionid', '0', '$ansName')";
          }
          $inserquery = $this->db->insert($rquery);
          if($inserquery){
            continue;
          }else{
            die('Error...');
          }
        }
      }
      $msg = "<span class='success'>Question Add Successfully</span>";
      return $msg;
     }
  }
  
    
  public function delQuestion($question){
    $tables = array("tbl_question","tbl_answer");
    foreach ($tables as $table) {
       $delquery = "DELETE FROM $table WHERE questionid ='$question'";
       $delData = $this->db->delete($delquery);
      
    }
    if($delData){
      $msg = "<span class='success'>Data Deleted !...</span>";
       return $msg;
    }else{
      $msg = "<span class='error'>Data not Deleted !...</span>";
       return $msg;
    }
  }

  // math process work

      public function fetchQuestion($question){
              $tables = array("tbl_question", "tbl_answer");
            foreach ($tables as $table) {
             $query = "SELECT * FROM $table WHERE questionid= '$question'";
             $fetchData = $this->db->select($query);
             $result = $fetchData->fetch_assoc();
             return $result;
            }    

      }

     public function getQueByOrder(){
      $query =  "SELECT * FROM tbl_question ORDER BY questionid ASC";
      $result = $this->db->select($query);
      return $result;
   }

   public function getTotalRows(){
       $query = "SELECT * FROM tbl_question";
       $getResult = $this->db->select($query);
       $total = $getResult->num_rows;
          return $total;
       }

       public function getQuestion(){
                
           $query = "SELECT * FROM tbl_question";
           $getdata = $this->db->select($query);
           $result = $getdata->fetch_assoc();
           return $result;
       }
        public function getQuesByNumber($number){
           $query = "SELECT * FROM tbl_question WHERE questionid = '$number'";
           $getdata = $this->db->select($query);
           $result = $getdata->fetch_assoc();
           return $result; 
       }
       public function getAnswer($number){
           $query = "SELECT * FROM tbl_answer WHERE questionid = '$number'";
           $getdata = $this->db->select($query);
           return $getdata;
       }



//english question

   function engQuestion($data){
    $questionid = mysqli_real_escape_string($this->db->link, $data['questionid']);
     $ques = mysqli_real_escape_string($this->db->link, $data['ques']);
     $ans = array();
     $ans[1]= $data['ans1'];
     $ans[2]= $data['ans2'];
     $ans[3]= $data['ans3'];
     $ans[4]= $data['ans4'];
     $rightans = $data['rightans'];
     $query = "INSERT INTO eng_question(questionid, ques) VALUES('$questionid ', '$ques')";
     $insert_row = $this->db->insert($query );
     if($insert_row){
      foreach ($ans as $key => $ansName) {
        if($ansName != ''){
          if($rightans == $key){
            $rquery = "INSERT INTO eng_answer(questionid, rightans, ans) VALUES('$questionid', '1', '$ansName')";
          }else{
            $rquery = "INSERT INTO eng_answer(questionid, rightans, ans) VALUES('$questionid', '0', '$ansName')";
          }
          $inserquery = $this->db->insert($rquery);
          if($inserquery){
            continue;
          }else{
            die('Error...');
          }
        }
      }
      $msg = "<span class='success'>Question Add Successfully</span>";
      return $msg;
     }
  }
   
    function delEngQuestion($question){
    $tables = array("eng_question","tbl_answer");
    foreach ($tables as $table) {
       $delquery = "DELETE FROM $table WHERE questionid ='$question'";
       $delData = $this->db->delete($delquery);
      
    }
    if($delData){
      $msg = "<span class='success'>Data Deleted !...</span>";
       return $msg;
    }else{
      $msg = "<span class='error'>Data not Deleted !...</span>";
       return $msg;
    }
  }

    public function fetchEngQuestion($question){
              $tables = array("eng_question", "eng_answer");
            foreach ($tables as $table) {
             $query = "SELECT * FROM $table WHERE questionid= '$question'";
             $fetchData = $this->db->select($query);
             $result = $fetchData->fetch_assoc();
             return $result;
            }    

      }

    function getEngQueByOrder(){
      $query =  "SELECT * FROM eng_question ORDER BY questionid ASC";
      $result = $this->db->select($query);
      return $result;
   }
    function getEngTotalRows(){
       $query = "SELECT * FROM eng_question";
       $getResult = $this->db->select($query);
       $total = $getResult->num_rows;
          return $total;
       }
       function getEngQuestion(){
           $query = "SELECT * FROM eng_question";
           $getdata = $this->db->select($query);
           $result = $getdata->fetch_assoc();
           return $result;
       }
        function getEngQuesByNumber($number){
           $query = "SELECT * FROM eng_question WHERE questionid = '$number'";
           $getdata = $this->db->select($query);
           $result = $getdata->fetch_assoc();
           return $getdata; 
       }
        function getEngAnswer($number){
           $query = "SELECT * FROM eng_answer WHERE questionid = '$number'";
           $getdata = $this->db->select($query);
           return $getdata;
       }

 // cse question
        function cseQuestion($data){
    $questionid = mysqli_real_escape_string($this->db->link, $data['questionid']);
     $ques = mysqli_real_escape_string($this->db->link, $data['ques']);
     $ans = array();
     $ans[1]= $data['ans1'];
     $ans[2]= $data['ans2'];
     $ans[3]= $data['ans3'];
     $ans[4]= $data['ans4'];
     $rightans = $data['rightans'];
     $query = "INSERT INTO cse_question(questionid, ques) VALUES('$questionid ', '$ques')";
     $insert_row = $this->db->insert($query );
     if($insert_row){
      foreach ($ans as $key => $ansName) {
        if($ansName != ''){
          if($rightans == $key){
            $rquery = "INSERT INTO cse_answer(questionid, rightans, ans) VALUES('$questionid', '1', '$ansName')";
          }else{
            $rquery = "INSERT INTO cse_answer(questionid, rightans, ans) VALUES('$questionid', '0', '$ansName')";
          }
          $inserquery = $this->db->insert($rquery);
          if($inserquery){
            continue;
          }else{
            die('Error...');
          }
        }
      }
      $msg = "<span class='success'>Question Add Successfully</span>";
      return $msg;
     }
  }
   
    function delCseQuestion($question){
    $tables = array("cse_question","tbl_answer");
    foreach ($tables as $table) {
       $delquery = "DELETE FROM $table WHERE questionid ='$question'";
       $delData = $this->db->delete($delquery);
      
    }
    if($delData){
      $msg = "<span class='success'>Data Deleted !...</span>";
       return $msg;
    }else{
      $msg = "<span class='error'>Data not Deleted !...</span>";
       return $msg;
    }
  }


    function getCseQueByOrder(){
      $query =  "SELECT * FROM cse_question ORDER BY questionid ASC";
      $result = $this->db->select($query);
      return $result;
   }
    function getCseTotalRows(){
       $query = "SELECT * FROM cse_question";
       $getResult = $this->db->select($query);
       $total = $getResult->num_rows;
          return $total;
       }
       function getCseQuestion(){
           $query = "SELECT * FROM cse_question";
           $getdata = $this->db->select($query);
           $result = $getdata->fetch_assoc();
           return $result;
       }
        function getCseQuesByNumber($number){
           $query = "SELECT * FROM cse_question WHERE questionid = '$number'";
           $getdata = $this->db->select($query);
           $result = $getdata->fetch_assoc();
           return $result; 
       }
        function getCseAnswer($number){
           $query = "SELECT * FROM cse_answer WHERE questionid = '$number'";
           $getdata = $this->db->select($query);
           return $getdata;
       }

       //agricultural

         function agriQuestion($data){
    $questionid = mysqli_real_escape_string($this->db->link, $data['questionid']);
     $ques = mysqli_real_escape_string($this->db->link, $data['ques']);
     $ans = array();
     $ans[1]= $data['ans1'];
     $ans[2]= $data['ans2'];
     $ans[3]= $data['ans3'];
     $ans[4]= $data['ans4'];
     $rightans = $data['rightans'];
     $query = "INSERT INTO agri_question(questionid, ques) VALUES('$questionid ', '$ques')";
     $insert_row = $this->db->insert($query );
     if($insert_row){
      foreach ($ans as $key => $ansName) {
        if($ansName != ''){
          if($rightans == $key){
            $rquery = "INSERT INTO agri_answer(questionid, rightans, ans) VALUES('$questionid', '1', '$ansName')";
          }else{
            $rquery = "INSERT INTO agri_answer(questionid, rightans, ans) VALUES('$questionid', '0', '$ansName')";
          }
          $inserquery = $this->db->insert($rquery);
          if($inserquery){
            continue;
          }else{
            die('Error...');
          }
        }
      }
      $msg = "<span class='success'>Question Add Successfully</span>";
      return $msg;
     }
  }
   
    function delAgriQuestion($question){
    $tables = array("agri_question","agri_answer");
    foreach ($tables as $table) {
       $delquery = "DELETE FROM $table WHERE questionid ='$question'";
       $delData = $this->db->delete($delquery);
      
    }
    if($delData){
      $msg = "<span class='success'>Data Deleted !...</span>";
       return $msg;
    }else{
      $msg = "<span class='error'>Data not Deleted !...</span>";
       return $msg;
    }
  }


    function getAgriQueByOrder(){
      $query =  "SELECT * FROM agri_question ORDER BY questionid ASC";
      $result = $this->db->select($query);
      return $result;
   }
    function getAgriTotalRows(){
       $query = "SELECT * FROM agri_question";
       $getResult = $this->db->select($query);
       $total = $getResult->num_rows;
          return $total;
       }
       function getAgriQuestion(){
           $query = "SELECT * FROM agri_question";
           $getdata = $this->db->select($query);
           $result = $getdata->fetch_assoc();
           return $result;
       }
        function getAgriQuesByNumber($number){
           $query = "SELECT * FROM agri_question WHERE questionid = '$number'";
           $getdata = $this->db->select($query);
           $result = $getdata->fetch_assoc();
           return $result; 
       }
        function getAgriAnswer($number){
           $query = "SELECT * FROM agri_answer WHERE questionid = '$number'";
           $getdata = $this->db->select($query);
           return $getdata;
       }
    // civil process work
         function civilQuestion($data){
    $questionid = mysqli_real_escape_string($this->db->link, $data['questionid']);
     $ques = mysqli_real_escape_string($this->db->link, $data['ques']);
     $ans = array();
     $ans[1]= $data['ans1'];
     $ans[2]= $data['ans2'];
     $ans[3]= $data['ans3'];
     $ans[4]= $data['ans4'];
     $rightans = $data['rightans'];
     $query = "INSERT INTO civil_question(questionid, ques) VALUES('$questionid ', '$ques')";
     $insert_row = $this->db->insert($query );
     if($insert_row){
      foreach ($ans as $key => $ansName) {
        if($ansName != ''){
          if($rightans == $key){
            $rquery = "INSERT INTO civil_answer(questionid, rightans, ans) VALUES('$questionid', '1', '$ansName')";
          }else{
            $rquery = "INSERT INTO civil_answer(questionid, rightans, ans) VALUES('$questionid', '0', '$ansName')";
          }
          $inserquery = $this->db->insert($rquery);
          if($inserquery){
            continue;
          }else{
            die('Error...');
          }
        }
      }
      $msg = "<span class='success'>Question Add Successfully</span>";
      return $msg;
     }
  }
   
    function delCivilQuestion($question){
    $tables = array("civil_question","civil_answer");
    foreach ($tables as $table) {
       $delquery = "DELETE FROM $table WHERE questionid ='$question'";
       $delData = $this->db->delete($delquery);
      
    }
    if($delData){
      $msg = "<span class='success'>Data Deleted !...</span>";
       return $msg;
    }else{
      $msg = "<span class='error'>Data not Deleted !...</span>";
       return $msg;
    }
  }


    function getCivilQueByOrder(){
      $query =  "SELECT * FROM civil_question ORDER BY questionid ASC";
      $result = $this->db->select($query);
      return $result;
   }
    function getCivilTotalRows(){
       $query = "SELECT * FROM civil_question";
       $getResult = $this->db->select($query);
       $total = $getResult->num_rows;
          return $total;
       }
       function getCivilQuestion(){
           $query = "SELECT * FROM civil_question";
           $getdata = $this->db->select($query);
           $result = $getdata->fetch_assoc();
           return $result;
       }
        function getCivilQuesByNumber($number){
           $query = "SELECT * FROM civil_question WHERE questionid = '$number'";
           $getdata = $this->db->select($query);
           $result = $getdata->fetch_assoc();
           return $result; 
       }
        function getCivilAnswer($number){
           $query = "SELECT * FROM civil_answer WHERE questionid = '$number'";
           $getdata = $this->db->select($query);
           return $getdata;
       }

       // eee process work

          function eeeQuestion($data){
    $questionid = mysqli_real_escape_string($this->db->link, $data['questionid']);
     $ques = mysqli_real_escape_string($this->db->link, $data['ques']);
     $ans = array();
     $ans[1]= $data['ans1'];
     $ans[2]= $data['ans2'];
     $ans[3]= $data['ans3'];
     $ans[4]= $data['ans4'];
     $rightans = $data['rightans'];
     $query = "INSERT INTO eee_question(questionid, ques) VALUES('$questionid ', '$ques')";
     $insert_row = $this->db->insert($query );
     if($insert_row){
      foreach ($ans as $key => $ansName) {
        if($ansName != ''){
          if($rightans == $key){
            $rquery = "INSERT INTO eee_answer(questionid, rightans, ans) VALUES('$questionid', '1', '$ansName')";
          }else{
            $rquery = "INSERT INTO eee_answer(questionid, rightans, ans) VALUES('$questionid', '0', '$ansName')";
          }
          $inserquery = $this->db->insert($rquery);
          if($inserquery){
            continue;
          }else{
            die('Error...');
          }
        }
      }
      $msg = "<span class='success'>Question Add Successfully</span>";
      return $msg;
     }
  }
   
    function delEeeQuestion($question){
    $tables = array("eee_question","eee_answer");
    foreach ($tables as $table) {
       $delquery = "DELETE FROM $table WHERE questionid ='$question'";
       $delData = $this->db->delete($delquery);
      
    }
    if($delData){
      $msg = "<span class='success'>Data Deleted !...</span>";
       return $msg;
    }else{
      $msg = "<span class='error'>Data not Deleted !...</span>";
       return $msg;
    }
  }


    function getEeeQueByOrder(){
      $query =  "SELECT * FROM eee_question ORDER BY questionid ASC";
      $result = $this->db->select($query);
      return $result;
   }
    function getEeeTotalRows(){
       $query = "SELECT * FROM eee_question";
       $getResult = $this->db->select($query);
       $total = $getResult->num_rows;
          return $total;
       }
       function getEeeQuestion(){
           $query = "SELECT * FROM eee_question";
           $getdata = $this->db->select($query);
           $result = $getdata->fetch_assoc();
           return $result;
       }
        function getEeeQuesByNumber($number){
           $query = "SELECT * FROM eee_question WHERE questionid = '$number'";
           $getdata = $this->db->select($query);
           $result = $getdata->fetch_assoc();
           return $result; 
       }
        function getEeeAnswer($number){
           $query = "SELECT * FROM eee_answer WHERE questionid = '$number'";
           $getdata = $this->db->select($query);
           return $getdata;
       }

       // electronics process work

          function eleQuestion($data){
    $questionid = mysqli_real_escape_string($this->db->link, $data['questionid']);
     $ques = mysqli_real_escape_string($this->db->link, $data['ques']);
     $ans = array();
     $ans[1]= $data['ans1'];
     $ans[2]= $data['ans2'];
     $ans[3]= $data['ans3'];
     $ans[4]= $data['ans4'];
     $rightans = $data['rightans'];
     $query = "INSERT INTO ele_question(questionid, ques) VALUES('$questionid ', '$ques')";
     $insert_row = $this->db->insert($query );
     if($insert_row){
      foreach ($ans as $key => $ansName) {
        if($ansName != ''){
          if($rightans == $key){
            $rquery = "INSERT INTO ele_answer(questionid, rightans, ans) VALUES('$questionid', '1', '$ansName')";
          }else{
            $rquery = "INSERT INTO ele_answer(questionid, rightans, ans) VALUES('$questionid', '0', '$ansName')";
          }
          $inserquery = $this->db->insert($rquery);
          if($inserquery){
            continue;
          }else{
            die('Error...');
          }
        }
      }
      $msg = "<span class='success'>Question Add Successfully</span>";
      return $msg;
     }
  }
   
    function delEleQuestion($question){
    $tables = array("ele_question","ele_answer");
    foreach ($tables as $table) {
       $delquery = "DELETE FROM $table WHERE questionid ='$question'";
       $delData = $this->db->delete($delquery);
      
    }
    if($delData){
      $msg = "<span class='success'>Data Deleted !...</span>";
       return $msg;
    }else{
      $msg = "<span class='error'>Data not Deleted !...</span>";
       return $msg;
    }
  }


    function getEleQueByOrder(){
      $query =  "SELECT * FROM ele_question ORDER BY questionid ASC";
      $result = $this->db->select($query);
      return $result;
   }
    function getEleTotalRows(){
       $query = "SELECT * FROM ele_question";
       $getResult = $this->db->select($query);
       $total = $getResult->num_rows;
          return $total;
       }
       function getEleQuestion(){
           $query = "SELECT * FROM ele_question";
           $getdata = $this->db->select($query);
           $result = $getdata->fetch_assoc();
           return $result;
       }
        function getEleQuesByNumber($number){
           $query = "SELECT * FROM ele_question WHERE questionid = '$number'";
           $getdata = $this->db->select($query);
           $result = $getdata->fetch_assoc();
           return $result; 
       }
        function getEleAnswer($number){
           $query = "SELECT * FROM ele_answer WHERE questionid = '$number'";
           $getdata = $this->db->select($query);
           return $getdata;
       }

       // Mechnical process work

          function mecQuestion($data){
    $questionid = mysqli_real_escape_string($this->db->link, $data['questionid']);
     $ques = mysqli_real_escape_string($this->db->link, $data['ques']);
     $ans = array();
     $ans[1]= $data['ans1'];
     $ans[2]= $data['ans2'];
     $ans[3]= $data['ans3'];
     $ans[4]= $data['ans4'];
     $rightans = $data['rightans'];
     $query = "INSERT INTO mec_question(questionid, ques) VALUES('$questionid ', '$ques')";
     $insert_row = $this->db->insert($query );
     if($insert_row){
      foreach ($ans as $key => $ansName) {
        if($ansName != ''){
          if($rightans == $key){
            $rquery = "INSERT INTO mec_answer(questionid, rightans, ans) VALUES('$questionid', '1', '$ansName')";
          }else{
            $rquery = "INSERT INTO mec_answer(questionid, rightans, ans) VALUES('$questionid', '0', '$ansName')";
          }
          $inserquery = $this->db->insert($rquery);
          if($inserquery){
            continue;
          }else{
            die('Error...');
          }
        }
      }
      $msg = "<span class='success'>Question Add Successfully</span>";
      return $msg;
     }
  }
   
    function delMecQuestion($question){
    $tables = array("mec_question","mec_answer");
    foreach ($tables as $table) {
       $delquery = "DELETE FROM $table WHERE questionid ='$question'";
       $delData = $this->db->delete($delquery);
      
    }
    if($delData){
      $msg = "<span class='success'>Data Deleted !...</span>";
       return $msg;
    }else{
      $msg = "<span class='error'>Data not Deleted !...</span>";
       return $msg;
    }
  }


    function getMecQueByOrder(){
      $query =  "SELECT * FROM mec_question ORDER BY questionid ASC";
      $result = $this->db->select($query);
      return $result;
   }
    function getMecTotalRows(){
       $query = "SELECT * FROM mec_question";
       $getResult = $this->db->select($query);
       $total = $getResult->num_rows;
          return $total;
       }
       function getMecQuestion(){
           $query = "SELECT * FROM mec_question";
           $getdata = $this->db->select($query);
           $result = $getdata->fetch_assoc();
           return $result;
       }
        function getMecQuesByNumber($number){
           $query = "SELECT * FROM mec_question WHERE questionid = '$number'";
           $getdata = $this->db->select($query);
           $result = $getdata->fetch_assoc();
           return $result; 
       }
        function getMecAnswer($number){
           $query = "SELECT * FROM mec_answer WHERE questionid = '$number'";
           $getdata = $this->db->select($query);
           return $getdata;
       }
  }

?>