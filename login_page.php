<?php
    session_start();
?>
<?php
  include "db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
     <!--Bootstrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css1.css">
    <link rel="stylesheet" href="css/feed2.css">

</head>
<body>
<div class="mynavbar">
    <nav class="navbar navbar-expand-lg navbar-light  fixed-top" id="navid">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#"> <strong style="padding-right:2rem">Knowledge
                    Spot</strong> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light text-center" href="index1.php"><strong> Home</strong></a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link text-light text-center" href="payment_status.php"><strong> Payment
                                Status</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light text-center" href="#"><strong>MyProfile</strong></a>
                    </li>
                          
                </ul>
            </div>
        </div>
    </nav>
</div>
    
      


<?php
                    echo '<br>';
                    echo '<br>';
                    
                        if($_SERVER['REQUEST_METHOD']=='POST')
                        {
                          $login_mailvar=$_POST['user_loginemail'];
                          $login_passvar=$_POST['user_loginpassword'];
                        //   echo $login_mailvar;
                        //   echo $login_passvar;
                          $login_sql_sql1=mysqli_query($conn,"SELECT * FROM `signup` where user_emailid='$login_mailvar'");
                          $login_fetch_row=mysqli_num_rows($login_sql_sql1);
                          if($login_fetch_row==1)
                          {
                            while($iter=mysqli_fetch_assoc($login_sql_sql1))
                            {
                              if(password_verify($login_passvar,$iter['user_password']))
                              {
                                
                                $_SESSION['login']=True;
                                $_SESSION['email']=$login_mailvar;
                                header("location:all_courses.php");
                                echo'<div class="alert alert-Success alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong>you login Successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                              }
                              else{
                                echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Warning!</strong> Check your Email and Password
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                              }
                            }
                          }
                          else{
                            echo'<div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>Warning!</strong> Check your Email and Password
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                          }
                        }

                    ?>

                 
                      <div class="container mylogin" style="margin-top:3rem;">
                      <h2 class="my-5"style="padding-top:2rem;font-weight:600">login form</h2>

                      <form action="login_page.php" method="POST">
                            <div class="mb-3">
                                <!-- <img src="logo/email.webp" alt="" class="sign-img1"> -->
                                <p style="font-weight: 600;">Email</p>
                                <input type="email" class="form-control" id="login-email" aria-describedby="emailHelp"
                                    placeholder="Enter your Email" name="user_loginemail" style="border-radius:2rem">
                            </div>
                            <div class="mb-3">
                                <!-- <img src="logo/key.png" alt="" class="sign-img1"> -->
                                <p style="font-weight: 600;">Password</p>
                                <input type="password" class="form-control" id="login-password"
                                    placeholder="Enter password" name="user_loginpassword" style="border-radius:2rem">
                            </div>
                            <input type="submit" value="login" class="btn btn-success"
                            style="color: white;font-weight: 550;border-radius: 0.8rem;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            style="color: white;padding: .3rem 0.8rem;font-weight: 550;border-color: #dc3545;border-radius: 0.8rem;background-color: #dc3545;">Close</button>
                            <br>
                        
                      </div>
                   
                      
<footer class="container-fluid" id="copyright-main" style="position:fixed; bottom:0;">
  <small id="CR">Copyright &copy; 2022 || Designed by KnowledgeSpot</small>
</footer>

 <!-- jquary and bootsrap and popper for javascript -->

 <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
            integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
</body>
</html>


