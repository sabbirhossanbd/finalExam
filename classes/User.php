<?php
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/Database.php');
   include_once ($filepath.'/../lib/Session.php');
   include_once ($filepath.'/../helpers/Format.php');

  
  class User {
  	private $db;
  	private $fm;
  	
  	function __construct(){
  		$this->db = new Database();
  		$this->fm = new Format();
  		
  }
    public function userRegistration($name, $email, $username, $password, $confirm){
      $name     = $this->fm->validation($name);
      $email    = $this->fm->validation($email);
      $username = $this->fm->validation($username);
      $password = $this->fm->validation($password);
      $confirm  = $this->fm->validation($confirm); 
      
     

      $name     = mysqli_real_escape_string($this->db->link, $name);
      $email    = mysqli_real_escape_string($this->db->link, $email);
      $username = mysqli_real_escape_string($this->db->link, $username);
      $password = mysqli_real_escape_string($this->db->link, md5($password));
      $confirm  = mysqli_real_escape_string($this->db->link, md5($confirm));
      
      
      
      if($name == "" || $email == "" || $username == "" || $password == "" || $confirm == ""){
          echo "<span class='error'> Field Must Not be Empty..</span>";
          exit();
        }else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo "<span class='error'>Invalid Email Address !</span>";
        exit();
      }else if ($password != $confirm){
       echo "<span class='error'>Password Did Not Match !</span>";
       exit();
      }else{
        $chkquery = "SELECT * FROM tbl_user WHERE email = '$email'";
        $chkresult = $this->db->select($chkquery);
        if($chkresult != false){
          echo "<span class='error'>Email Address Already Exist !</span>";
          exit();
        }else{
          $query = "INSERT INTO tbl_user(name, email, username, password, confirm) VALUES('$name', '$email', '$username', '$password', '$confirm')";
          $insert_row = $this->db->insert($query);
          if($insert_row){
            echo "<span class='success'>Registration Successfully Done !</span>";
            exit();
          }else{
            echo "<span class='error'>ERROR....Not Registered !</span>";
            exit();
          }
        }
      }
      
     
    }

    public function userLogin($email, $password){
      $email    = $this->fm->validation($email);
      $password = $this->fm->validation($password);

      $email    = mysqli_real_escape_string($this->db->link, $email);
      $password = mysqli_real_escape_string($this->db->link, $password);

      if($email == "" || $password == ""){
          echo "empty";
          exit();
        }else{
             $query = "SELECT * FROM  tbl_user WHERE email='$email' AND password='$password'";
             $result = $this->db->select($query);
             if ($result != false) {
                $value = $result->fetch_assoc();
                if ($value['status'] == '1') {
                   echo "disable";
                   exit();
                }else{
                  Session::init();
                  Session::set("login", true);
                  Session::set("userid", $value['userid']);
                  Session::set("username", $value['username']);
                  Session::set("name", $value['name']);
                }
             }else{
              echo "error";
              exit();
             }
        }
    }


    

    public function getAdminData($data){
      $adminUser = $this->fm->validation($data['adminUser']);
      $adminPass = $this->fm->validation($data['adminPass']);
      $adminUser  = mysqli_real_escape_string($this->db->link, $adminUser);
      $adminPass = mysqli_real_escape_string($this->db->link, md5($adminPass));

     
    }
    public function getUserData($userid){
      $query = "SELECT * FROM  tbl_user WHERE userid = '$userid'";
      $result = $this->db->select($query);
      return $result;
    }
    public function getAllUser(){
       $query = "SELECT * FROM  tbl_user ORDER BY userid DESC";
       $result = $this->db->select($query);
       return $result;
  }
  public function updateUserData($userid, $data){
      $name     = $this->fm->validation($data['name']);  
      $username = $this->fm->validation($data['username']);
      $email    = $this->fm->validation($data['email']);
      
     

      $name     = mysqli_real_escape_string($this->db->link, $name);     
      $username = mysqli_real_escape_string($this->db->link, $username);
      $email    = mysqli_real_escape_string($this->db->link, $email);
      $query = "UPDATE tbl_user
              SET 
              name = '$name',
              username = '$username',
              email = '$email'

              WHERE userid = '$userid'";
    $updated_row = $this->db->update($query);

             if ($updated_row){
              $msg = "<span class='success'>User Data Updated !</span";
              return $msg;
             }else{
              $msg = "<span class='error'>User Data Not Updated !</span";
              return $msg;
             }
  }
  public function disableUser($userid){
    $query = "UPDATE tbl_user
              SET 
              status = '1'
              WHERE userid = '$userid'";
    $updated_row = $this->db->update($query);

             if ($updated_row){
              $msg = "<span class='success'>User Disabled !</span";
              return $msg;
             }else{
              $msg = "<span class='error'>User not Disabled !</span";
              return $msg;
             }
  }
  public function enableUser($userid){
    $query = "UPDATE tbl_user
             SET
             status = '0'
             WHERE userid ='$userid' ";
    $update_row = $this->db->update($query);
         if($update_row){
            $msg = "<span class='success'>User Enabled !</span";
              return $msg;
         }else{
            $msg = "<span class='error'>User not Enabled !</span";
              return $msg; 
         }
  }
  public function deleteUser($userid){
       $query = "DELETE FROM tbl_user WHERE userid = '$userid'";
       $delData = $this->db->delete($query);
       if($delData){
            $msg = "<span class='success'>User Removed !</span";
              return $msg;
         }else{
            $msg = "<span class='error'>User not Removed !</span";
              return $msg; 
         }
  }
}
?>