$(function(){
  //For user Registration
  $("#regsubmit").click(function(){
        var name     = $("#name").val();
        var email    = $("#email").val();
        var username = $("#username").val();
        var password = $("#password").val();
        
        var confirm = $("#confirm").val();
        var datastring = 'name='+name+'&email='+email+ '&username='+username+'&password='+password+'&confirm='+confirm;
        $.ajax({
          method: "POST",
          url:"getregister.php",
          data: datastring,
           cache: false,
          success: function(data){
            $("#state").html(data);
          }
        });
        return false;
  });

  $("#loginsubmit").click(function(){
        
        var email    = $("#email").val(); 
        var password = $("#password").val(); 
        var datastring = 'email='+email+'&password='+password;
        $.ajax({
          type: "POST",
          url:"getlogin.php",
          data: datastring,
          success: function(data){
            if ($.trim(data) == "empty") {
                    $(".empty").show();
                    setTimeout(function(){
                      $(".empty").fadeOut();
                    },3000);
            } else if ($.trim(data) == "disable") {
                    $(".disable").show();
                    setTimeout(function(){
                      $(".disable").fadeOut();
                    },3000);
            }else if ($.trim(data) == "error") {
                    $(".error").show();
                    setTimeout(function(){
                      $(".error").fadeOut();
                    },3000);
            } else {
              window.location = "exam.php";
            }
          }
        });
        return false;
  });

}); 