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

    <div class="container-fluid fixed">
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
            <div class="col-sm-10 my-3" id="course_part2">
                <?php
                 if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    $your_orderId=$_POST['ORDER_ID'];
                    $buyer_Email=$_POST['CUST_ID'];
                    $Bought_course=$_POST['Bought_course'];
                    $user_used_email=$_SESSION['email'];
                    $check_insert_condition=mysqli_query($conn,"SELECT * FROM `sell_courses_list` where Sold_course='$Bought_course' && buyer_Email='$user_used_email' ");
                    $check_num_insert=mysqli_num_rows($check_insert_condition);
                    if($check_num_insert==0){
                    mysqli_query($conn,"INSERT INTO `sell_courses_list` (`Sell_id`, `Order_id`, 
                    `buyer_Email`, `Sold_course`) VALUES (NULL, '$your_orderId', '$buyer_Email', '$Bought_course');");
                    }
                }
                   echo'<h3 class="my-5 text-center text-light py-2" style="border-radius:2rem;
                   background-color: darkseagreen !important;font-size: 2.5rem;">Your Courses</h3>';
                   $user_used_email=$_SESSION['email'];
                    $fetch_Bought_course=mysqli_query($conn,"SELECT * FROM `sell_courses_list` where buyer_Email='$user_used_email'");
                    while($Bought_course_row=mysqli_fetch_assoc($fetch_Bought_course))
                    {
                        $course_var=$Bought_course_row['Sold_course'];
                          $fetch_course_details2=mysqli_query($conn,"SELECT * FROM `website_course` where Course_name='$course_var'");
                        while($row_course_details2=mysqli_fetch_assoc($fetch_course_details2)){
                            echo '
                            
                            <div class="card mb-3 my-5" style="max-width: 540px;max-width: 917px;border: 1px solid darkseagreen;
                            margin-left: 6rem;height: 15rem;">
                            <h4 class="text-center py-2 text-light my-0" style="font-size: 1.4rem;background-color: darkcyan !important;">
                            Hands on '.$row_course_details2['Course_name'].'</h4>
                            <div class="row g-0">
                                <div class="col-md-4">
                                <img src="image/'.$row_course_details2['Course_img'].'" class="img-fluid rounded-start" alt="..." 
                                style="max-width: 100%;height: 12.2rem;">
                                </div>
                                <div class="col-md-8">
                                <div class="card-body">
                                
                                    <p class="card-text">In this course have many lectures that will provide you good knowledge related to '.$row_course_details2['Course_name'].'.</p>
                                    <span> <strong>Duration</strong>: &nbsp; '.$row_course_details2['Course_duration'].'</span>
                                    <p> <strong>Instructor</strong>: &nbsp; '.$row_course_details2['Course_author'].'</p>
                                    <a href="lecture_videos.php?lecture_course='.$row_course_details2['Course_name'].'" class="btn btn-primary"><strong>Watch Course</strong></a>
                                   
                                    </div>
                                </div>
                            </div>
                            </div>';
                        }

                       
                    }
                
                
        // we are fetching the course_details from Bought_course name of order database

    ?>



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