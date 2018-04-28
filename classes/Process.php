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
  // math process
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


  // civil process
  public function civilProcessData($data){
    $selectedAns = $this->fm->validation($data['ans']);
    $number      = $this->fm->validation($data['number']);
    $selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
    $number      = mysqli_real_escape_string($this->db->link, $number);
    $next        = $number + 1;

    if(!isset($_SESSION['score'])){ 
      $_SESSION['score'] = '0';
    }
    $total = $this->getCivilTotal();
    $right = $this->civilrightAns($number);
    if($right == $selectedAns){
      $_SESSION['score']++;
    }
    if($number == $total){
      header("Location:civilFinal.php");
      exit();
    }else{
      header("Location:civiltest.php?q=".$next);
    }
  }

  private function getCivilTotal(){
    $query = "SELECT * FROM civil_question";
       $getResult = $this->db->select($query);
       $total = $getResult->num_rows;
          return $total;
  }
  private function civilrightAns($number){
       $query = "SELECT * FROM civil_answer WHERE questionid = '$number' AND rightans = '1'";
       $getdata = $this->db->select($query)->fetch_assoc();
       $result = $getdata['ansid'];
       return $result;
  }
 
 // mechnacial process

  public function mecProcessData($data){
    $selectedAns = $this->fm->validation($data['ans']);
    $number      = $this->fm->validation($data['number']);
    $selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
    $number      = mysqli_real_escape_string($this->db->link, $number);
    $next        = $number + 1;

    if(!isset($_SESSION['score'])){ 
      $_SESSION['score'] = '0';
    }
    $total = $this->getMecTotal();
    $right = $this->mecrightAns($number);
    if($right == $selectedAns){
      $_SESSION['score']++;
    }
    if($number == $total){
      header("Location:mecFinal.php");
      exit();
    }else{
      header("Location:mectest.php?q=".$next);
    }
  }

  private function getMecTotal(){
    $query = "SELECT * FROM mec_question";
       $getResult = $this->db->select($query);
       $total = $getResult->num_rows;
          return $total;
  }
  private function mecrightAns($number){
       $query = "SELECT * FROM mec_answer WHERE questionid = '$number' AND rightans = '1'";
       $getdata = $this->db->select($query)->fetch_assoc();
       $result = $getdata['ansid'];
       return $result;
  }
   
   // electronics process

  public function eleProcessData($data){
    $selectedAns = $this->fm->validation($data['ans']);
    $number      = $this->fm->validation($data['number']);
    $selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
    $number      = mysqli_real_escape_string($this->db->link, $number);
    $next        = $number + 1;

    if(!isset($_SESSION['score'])){ 
      $_SESSION['score'] = '0';
    }
    $total = $this->getEleTotal();
    $right = $this->elerightAns($number);
    if($right == $selectedAns){
      $_SESSION['score']++;
    }
    if($number == $total){
      header("Location:eleFinal.php");
      exit();
    }else{
      header("Location:eletest.php?q=".$next);
    }
  }

  private function getEleTotal(){
    $query = "SELECT * FROM ele_question";
       $getResult = $this->db->select($query);
       $total = $getResult->num_rows;
          return $total;
  }
  private function elerightAns($number){
       $query = "SELECT * FROM ele_answer WHERE questionid = '$number' AND rightans = '1'";
       $getdata = $this->db->select($query)->fetch_assoc();
       $result = $getdata['ansid'];
       return $result;
  }

  // eee process

  public function eeeProcessData($data){
    $selectedAns = $this->fm->validation($data['ans']);
    $number      = $this->fm->validation($data['number']);
    $selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
    $number      = mysqli_real_escape_string($this->db->link, $number);
    $next        = $number + 1;

    if(!isset($_SESSION['score'])){ 
      $_SESSION['score'] = '0';
    }
    $total = $this->getEeeTotal();
    $right = $this->eeerightAns($number);
    if($right == $selectedAns){
      $_SESSION['score']++;
    }
    if($number == $total){
      header("Location:eeeFinal.php");
      exit();
    }else{
      header("Location:eeetest.php?q=".$next);
    }
  }

  private function getEeeTotal(){
    $query = "SELECT * FROM eee_question";
       $getResult = $this->db->select($query);
       $total = $getResult->num_rows;
          return $total;
  }
  private function eeerightAns($number){
       $query = "SELECT * FROM eee_answer WHERE questionid = '$number' AND rightans = '1'";
       $getdata = $this->db->select($query)->fetch_assoc();
       $result = $getdata['ansid'];
       return $result;
  }

 // agricultural process

  public function agriProcessData($data){
    $selectedAns = $this->fm->validation($data['ans']);
    $number      = $this->fm->validation($data['number']);
    $selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
    $number      = mysqli_real_escape_string($this->db->link, $number);
    $next        = $number + 1;

    if(!isset($_SESSION['score'])){ 
      $_SESSION['score'] = '0';
    }
    $total = $this->getAgriTotal();
    $right = $this->agrirightAns($number);
    if($right == $selectedAns){
      $_SESSION['score']++;
    }
    if($number == $total){
      header("Location:agriFinal.php");
      exit();
    }else{
      header("Location:agritest.php?q=".$next);
    }
  }

  private function getAgriTotal(){
    $query = "SELECT * FROM agri_question";
       $getResult = $this->db->select($query);
       $total = $getResult->num_rows;
          return $total;
  }
  private function agrirightAns($number){
       $query = "SELECT * FROM agri_answer WHERE questionid = '$number' AND rightans = '1'";
       $getdata = $this->db->select($query)->fetch_assoc();
       $result = $getdata['ansid'];
       return $result;
  }
 
 //

}

  ?>