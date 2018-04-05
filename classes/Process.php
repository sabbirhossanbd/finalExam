<?php
   $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Session.php');
    //Session::init();
   include_once ($filepath.'/../lib/Database.php');
   include_once ($filepath.'/../helpers/Format.php');

  
  class Process {
  	private $db;
  	private $fm;
  	
  	function __construct(){
  		$this->db = new Database();
  		$this->fm = new Format();
  		
  }
  public function ProcessData($data){
    $selectedAns = $this->fm->validation($data['ans']);
    $number      = $this->fm->validation($data['number']);
    $selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
    $number      = mysqli_real_escape_string($this->db->link, $number);
    $next        = $number + 1;

    if(!isset($_SESSION['score'])){ 
      $_SESSION['score'] = '0';
    }
    $total = $this->getTotal();
    $right = $this->rightAns($number);
    if($right == $selectedAns){
      $_SESSION['score']++;
    }
    if($number == $total){
      header("Location:final.php");
      exit();
    }else{
      header("Location:test.php?q=".$next);
    }
  }
  private function getTotal(){
    $query = "SELECT * FROM tbl_question";
       $getResult = $this->db->select($query);
       $total = $getResult->num_rows;
          return $total;
  }
  private function rightAns($number){
       $query = "SELECT * FROM tbl_answer WHERE questionid = '$number' AND rightans = '1'";
       $getdata = $this->db->select($query)->fetch_assoc();
       $result = $getdata['ansid'];
       return $result;
  }

  //eng question
    public function engProcessData($data){
    $selectedAns = $this->fm->validation($data['ans']);
    $number      = $this->fm->validation($data['number']);
    $selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
    $number      = mysqli_real_escape_string($this->db->link, $number);
    $next        = $number + 1;

    if(!isset($_SESSION['score'])){ 
      $_SESSION['score'] = '0';
    }
    $total = $this->getEngTotal();
    $right = $this->engrightAns($number);
    if($right == $selectedAns){
      $_SESSION['score']++;
    }
    if($number == $total){
      header("Location:engFinal.php");
      exit();
    }else{
      header("Location:engtest.php?q=".$next);
    }
  }

  private function getEngTotal(){
    $query = "SELECT * FROM eng_question";
       $getResult = $this->db->select($query);
       $total = $getResult->num_rows;
          return $total;
  }
  private function engrightAns($number){
       $query = "SELECT * FROM eng_answer WHERE questionid = '$number' AND rightans = '1'";
       $getdata = $this->db->select($query)->fetch_assoc();
       $result = $getdata['ansid'];
       return $result;
  }

  //cse question
    public function cseProcessData($data){
    $selectedAns = $this->fm->validation($data['ans']);
    $number      = $this->fm->validation($data['number']);
    $selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
    $number      = mysqli_real_escape_string($this->db->link, $number);
    $next        = $number + 1;

    if(!isset($_SESSION['score'])){ 
      $_SESSION['score'] = '0';
    }
    $total = $this->getCseTotal();
    $right = $this->cserightAns($number);
    if($right == $selectedAns){
      $_SESSION['score']++;
    }
    if($number == $total){
      header("Location:cseFinal.php");
      exit();
    }else{
      header("Location:csetest.php?q=".$next);
    }
  }

  private function getCseTotal(){
    $query = "SELECT * FROM cse_question";
       $getResult = $this->db->select($query);
       $total = $getResult->num_rows;
          return $total;
  }
  private function cserightAns($number){
       $query = "SELECT * FROM cse_answer WHERE questionid = '$number' AND rightans = '1'";
       $getdata = $this->db->select($query)->fetch_assoc();
       $result = $getdata['ansid'];
       return $result;
  }

}

  ?>