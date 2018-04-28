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
      $passwor  = mysqli_real_escape_string($this->db->link, md5($password));


      // for password
      $reg    = preg_match("#[\\~\\`\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\-\\+\\=\\{\\}\\[\\]\\|\\:\\;\\&lt;\\&gt;\\.\\?\\/\\\\\\\\]+#", $password);
      
      //$word_hash = password_hash($password, PASSWORD_DEFAULT);
      
      
      
      
      
      if($name == "" || $email == "" || $username == "" || $password == ""){
           echo "<span class='error'> Field Must Not be Empty..</span>";
           exit();
        } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
           echo "<span class='error'>Invalid Email Address !</span>";
           exit();
       }  else if ($password != $confirm) {
          echo "<span class='error'>Password did not matched!</span>";
        } else if (!$reg || strlen($password) < 8) {
                
                echo "<span class='error'>The password does not meet requirement!</span>";
                exit();
        } else{
          $chkquery_email = "SELECT * FROM tbl_user WHERE email = '$email'";
          $chkquery_user = "SELECT * FROM tbl_user WHERE username = '$username'";

          $chkresult_email = $this->db->select($chkquery_email);
          $chkresult_user = $this->db->select($chkquery_user);

          if($chkresult_email != false){
           echo "<span class='error'>Email Address Already Exist !</span>";
           exit();
        } else if ($chkresult_user != false) {
           echo "<span class='error'>Username Already Exist !</span>";
           exit();
          }
           else{
          $query = "INSERT INTO tbl_user(name, email, username, password) VALUES('$name', '$email', '$username', '$passwor')";
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

    // user login
    public function userLogin($email, $password){
          
      $email    = $this->fm->validation($email);
      $password = $this->fm->validation($password);

      $email    = mysqli_real_escape_string($this->db->link, $email);
      $password = mysqli_real_escape_string($this->db->link, $password);
        
      if($email == "" || $password == ""){

         echo "empty";
            exit();
        }

      else{
             $query = "SELECT * FROM  tbl_user WHERE email='$email' AND password = '$password'";
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


 public function resetPassword($ema, $user, $newp){
      $emaill     = $this->fm->validation($ema);  
      $usernamev   = $this->fm->validation($user);  
      $new_passs  = $this->fm->validation($newp);
      
      $email    = mysqli_real_escape_string($this->db->link, $emaill);
      $username = mysqli_real_escape_string($this->db->link, $usernamev);
      $new_pass = mysqli_real_escape_string($this->db->link, $new_passs);

      /*$uppercase = preg_match('@[A-Z]@', $new_pass);
      $lowercase = preg_match('@[a-z]@', $new_pass);
      $number    = preg_match('@[0-9]@', $new_pass);*/

     // $reg    = preg_match("#[\\~\\`\\!\\@\\#\\$\\%\\^\\&\\*\\(\\)\\_\\-\\+\\=\\{\\}\\[\\]\\|\\:\\;\\&lt;\\&gt;\\.\\?\\/\\\\\\\\]+#", $new_passs);

      
      $chang_pass = "SELECT password FROM tbl_user WHERE email='$email' AND username='$username'";
      $result = $this->db->select($chang_pass);
      
      if(!$result){
        echo "<span style='color: red'>The email address Or Username does not exist</span>";

      } /*else if (!$uppercase || !$lowercase || !$number || strlen($new_pass) < 8) {
                
          echo "<span class='error'>The password does not meet requirement!</span>";          
     }*/

       else {
        $sql = "UPDATE tbl_user SET password ='$new_pass' WHERE email = '$email'";
        $sucpass=$this->db->update($sql);
        if($sucpass){
          echo "Password Updated Successfully";
        } else {
          echo "Something Wrong!!";
        }
      }
     
 }

}
?>