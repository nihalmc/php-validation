
  <?php
    $usernameErr = $emailErr =$passwordErr = "";
    $username =$email =$password ="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {
            $usernameErr = "Name is required";
        } else {
            $username = test_input($_POST["username"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
                $usernameErr= "only letters and white spaces allowed";
            }
        }
        if(empty($_POST["email"])) {
            $emailErr = "Email is required";
        }else{
            $email=test_input($_POST["email"]);
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                $emailErr = "The email address is incorrect";
            }
    
        }
        if(empty($_POST['password']))
                    {
                        $passwordErr='Enter Your Password!';
                    }
                    else
                    {
                        $password = test_input($_POST['password']);
                        if(!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,16}$/',$password))
                        {
                            $passwordErr='Invalid Format! Re-Enter Password!';
                        }
                    }   
    }
    function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
    ?>
 

 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" >
    <title>Login Form</title>
  </head>
  <body>
        <div class="container-fluid mb-5 ">
            <form class="mx-auto" action="<?php echo 
   htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
                <h4 class="text-center">Login</h4>
                <div class="mt-5">
                  <label for="exampleInputEmail1" class="form-label ">User Name</label>
                  <input type="name" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <span class="error">* <?php echo $usernameErr;?></span>
                </div>
                <div class="mt-1">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <span class="error">* <?php echo $emailErr;?></span>
                  </div>
                <div class="mt-1">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                  <span class="error">* <?php echo $passwordErr;?></span><br>
                  <div id="emailHelp" class="form-text mt-3">Forget password ?</div>
                </div>
              
                <input type="submit" class="submit-btn" value="submit" name="submit">
              </form>
        </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html> 

  