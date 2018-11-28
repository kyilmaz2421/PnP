<?php
  // include("php/session.php");
  include("php/sign_in_page.php");
  // echo (isset($_SESSION['login_user']));
  // include("php/server_config.php");


  if(isset($_SESSION['logout']) && $_SESSION['logout'] == TRUE){
        unset($_SESSION['login_user']);
        unset($_SESSION['login_firstName']);
        unset($_SESSION['login_lastName']);
        unset($_SESSION['login_email']);
        unset($_SESSION['login_phoneNumFormatted']);
        unset($_SESSION['login_phoneNumber']);
        unset($_SESSION['login_genderFormatted']);
        unset($_SESSION['login_gender']);
        unset($_SESSION['login_bdayFormatted']);
        unset($_SESSION['login_birthdate']);
        unset($_SESSION['login_description']);
        echo "You have been successfully logged out.";

        session_destroy();
        session_unset();
    }

    if($_SESSION['redirect'] == TRUE){
        echo "You must login before accessing the page you tried to access.";
    }

?>
<!DOCTYPE html>
<html>
<head>
  <title>PnP</title>

  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- StyleSheets -->
  <link rel="stylesheet" type="text/css" href="css/general.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body>

  <header>
    <h1>PnP</h1>
    <p> - - - Place n Party</p>
  </header>

  <div id="formHolder">
    <form action="" method="POST" >
      <div class="container">
        <h1>Sign In</h1>
        <p>Please fill in this form to <b>sign in</b>.</p>
        <hr>

        <label for="username"><b>Username</b></label>
        <input id="username" type="text" placeholder="Enter Username" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input id="password" type="password" placeholder="Enter Password" name="password" required>

        <div class="clearfix">
          <!-- <button type="button" class="cancelbtn">Cancel</button> -->
          <button id="signIn" type="button" class="signupbtn">Sign In</button>
        </div>
      </div>
    </form>

  <form method="POST" action="php/create_user.php" style="border-left:1px solid #154360">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to <b>create an account</b>.</p>
      <hr>
        <label for="firstname"><b>First Name</b></label>
        <input type="text" placeholder="First Name" name="firstname" required>

        <label for="lastname"><b>Last Name</b></label>
        <input type="text" placeholder="Last Name" name="lastname" required>

        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Create A Username" name="username" required>

        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <label for="bday"><b>Birthday</b></label> 
        <input type="date" name="bday"> 

        <label for="tel"><b>Telephone Number</b></label> 
        <input type="tel" placeholder="Enter Phone Number" name="tel"> 

        <label for="gender"><b>Gender</b></label> <br>
        <form action="">
          <input type="radio" name="gender" style="margin-bottom:15px"> Female
          <input type="radio" name="gender" style="margin-bottom:15px"> Male <br>
        </form>

        <label for="info"><b>Tell Us A Bit About You</b></label>
        <input type="text" placeholder="Description" name="info" maxlength="100" required>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
          <!-- <button type="button" class="cancelbtn">Cancel</button> -->
          <button type="submit" class="signupbtn">Sign Up</button>
        </div>
      </div>
    </form>
  </div>

      <script type="text/JavaScript">
              $( document ).ajaxComplete(function() {
                  // alert("complete");
              });


              $('#signIn').click(function(e) {
                e.preventDefault();
                $.ajax({
                   type: "POST",
                   url: 'php/sign_in_page.php',
                   data: {
                      username: $("#username").val(),
                      password: $("#password").val()
                    },
                   success: function(data)
                   {
                      if (data === 'ValidCredentials') {
                        window.location = '/pnp/views/viewingPage.php';
                      }
                      else {
                          alert(data);
                         $(".clearfix").after("<h3 style='color: red;'>Invalid Credentials</h3>");
                      }
                   }
               });
             });
      </script>

</body>
</html>

