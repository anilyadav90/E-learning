<?php
    session_start();
    if((!isset($_SESSION['login'])) && ($_SESSION['login']==False)){
        header('location:login_page.php');
    }
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
                    <a href="my_course.php" class="sidebar-contant">My Course</a>
                </div>
                <div class="side1">
                    <img src="logo/logout.png" alt="" height="20px">
                    <a href="logout.php" class="sidebar-contant">logout</a>
                </div>
            </div>
            <div class="col-sm-10 my-3 profile_part">
                <div class="container">

                    <?php
                    $logged_email2=$_SESSION['email'];
                    $profileupdated_fetch_row=mysqli_query($conn,"SELECT * FROM `profile_list` where profileUser_Email='$logged_email2'");
                    
                    while($profileupdated_row=mysqli_fetch_assoc($profileupdated_fetch_row))
                    {
                       echo' <form class="profile_form">
                       <div class="side1 text-center my-5">

                       <img src="image/'.$profileupdated_row['profileuser_Picture'].'" alt="insert your image" height="140px" class="user_profile_image">
                       </div>
                       <div class="side1 text-center">

                       <a href="profile_update.php" style="font-weight:600">Update profile</a>
                       </div>
                     

                        <div class="mb-3 my-3 text-center">
                            <label for="exampleUserEmail_pro" class="form-label">User Email:</label>
                            <input type="email" class="form-control profile_part_input text-center" id="exampleUserEmail_pro"
                                aria-describedby="emailHelp"  readonly value="'.$_SESSION['email'].'">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="exampleUserName_pro" class="form-label">User Name:</label>
                            <input type="email" class="form-control profile_part_input text-center" id="exampleUserName_pro"
                                aria-describedby="emailHelp"  readonly value="'.$profileupdated_row['profileuser_name'].'">
                        </div>
                        <div class="mb-3 text-center">
                        <label for="exampleUserCountry_pro" class="form-label">User Country:</label>
                        <input  class="form-control profile_part_input text-center" id="exampleUserCountry_pro"
                            aria-describedby="emailHelp"  readonly value='.$profileupdated_row['profileuser_Country'].'>
                    </div>
                    <div class="mb-3 text-center">
                    <label for="exampleUserState_pro" class="form-label">User State:</label>
                    <input type="email" class="form-control profile_part_input text-center" id="exampleUserState_pro"
                        aria-describedby="emailHelp"  readonly value="'.$profileupdated_row['profileuser_State'].'">
                </div>
                            <div class="mb-3 text-center">
                            <label for="exampleUserCity_pro" class="form-label">User City:</label>
                            <input type="email" class="form-control profile_part_input text-center" id="exampleUserCity_pro"
                                aria-describedby="emailHelp"  readonly value="'.$profileupdated_row['profileuser_City'].'">
                        </div>
                        <div class="mb-3 text-center">
                        <label for="exampleUserAge_pro" class="form-label">User Age:</label>
                        <input type="email" class="form-control profile_part_input text-center" id="exampleUserAge_pro"
                            aria-describedby="emailHelp"  readonly value="'.$profileupdated_row['profileuser_Age'].'">
                    </div>
                                
                    </form>'; }
                ?>
                </div>
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
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>