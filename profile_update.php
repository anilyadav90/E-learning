<?php
  session_start();
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
    <link rel="stylesheet" href="css/admin_css.css">
    <link rel="stylesheet" href="css/css1.css">
    <link rel="stylesheet" href="css/feed2.css">
    <link rel="stylesheet" href="css/admin_course_css.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light adminpage-navbar">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">KnowledgeSpot</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-2 my-3 admin-sidebar">
                <div class="side1" style="padding-top:3rem;">
                    <img src="logo/home.png" alt="" height="20px">
                    <a href="index1.php" class="sidebar-contant">Home</a>
                </div>
                <div class="side1">
                    <img src="logo/lesson.png" alt="" height="20px">
                    <a href="myprofile.php" class="sidebar-contant">Profile</a>
                </div>
                <div class="side1">
                    <img src="logo/course.png" alt="" height="20px">
                    <a href="#" class="sidebar-contant">My Course</a>
                </div>
                <div class="side1">
                    <img src="logo/logout.png" alt="" height="20px">
                    <a href="logout.php" class="sidebar-contant">logout</a>
                </div>
            </div>
            <div class="col-sm-10 my-3 admin-sidebarcontant">

                <div class="container my-5">
                    <form action="profile_update.php" method="post">
                        <div class="container updateProfile_head bg-dark text-light text-center my-3">Update Profile
                        </div>
                        <div class="mb-3">
                            <label for="exampleProfileUserName" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="exampleProfileUserName"
                                name="exampleProfileUserName" value=" ">
                        </div>
                        <div class="mb-3">
                            <label for="exampleProfileCountry" class="form-label">Country</label>
                            <input type="text" class="form-control" id="exampleProfileCountry"
                                name="exampleProfileCountry" value=" ">
                        </div>
                        <div class="mb-3">
                            <label for="exampleProfileState" class="form-label">State</label>
                            <input type="text" class="form-control" id="exampleProfileState" name="exampleProfileState"
                                value=" ">
                        </div>
                        <div class="mb-3">
                            <label for="exampleProfileCity" class="form-label">City</label>
                            <input type="text" class="form-control" id="exampleProfileCity" name="exampleProfileCity"
                                value=" ">
                        </div>
                        <div class="mb-3">
                            <label for="exampleProfileAge" class="form-label">Age</label>
                            <input type="text" class="form-control" id="exampleProfileAge" name="exampleProfileAge"
                                value=" ">
                        </div>

                        <div class="mb-3">
                            <label for="exampleProfilePicture" class="form-label">Profile picture</label>
                            <input type="file" id="exampleProfilePicture" name="exampleProfilePicture" value=" ">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <?php
                                
                                $logged_email=$_SESSION['email'];
                             if($_SERVER['REQUEST_METHOD']=='POST')
                             {
                                $profile_UserName=$_POST['exampleProfileUserName'];
                                $profile_UserCountry=$_POST['exampleProfileCountry'];
                                $profile_UserState=$_POST['exampleProfileState'];
                                $profile_UserCity=$_POST['exampleProfileCity'];
                                $profile_UserAge=$_POST['exampleProfileAge'];
                                $profile_UserPicture=$_POST['exampleProfilePicture'];

                                
                                
                                mysqli_query($conn,"UPDATE `profile_list` SET `profileuser_name` = '$profile_UserName',`profileuser_Country` = '$profile_UserCountry',`profileuser_State` = '$profile_UserState',`profileuser_City` = '$profile_UserCity',`profileuser_Age` = '$profile_UserAge', `profileuser_Picture` = '$profile_UserPicture' WHERE `profile_list`.`profileUser_Email` ='$logged_email';");
                                echo'<div class="alert alert-Success alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong>updated Successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                             }
                             else{
                                echo 'wrong output';
                             }
                               
                        ?>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- jquary and bootsrap and popper for javascript -->

    <footer class="container-fluid" id="copyright-main">
        <small id="CR">Copyright &copy; 2022 || Designed by KnowledgeSpot || <a href="logout.php"
                id="admin-link">logout</a></small>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>


</body>

</html>