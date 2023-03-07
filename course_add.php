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
    <?php
        include "admin_navbar.php";
   
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 my-3 admin-sidebar2">
                <div class="side1">
                    <img src="logo/home.png" alt="" height="20px">
                    <a href="index1.php" class="sidebar-contant">Home</a>
                </div>
                <div class="side1">
                    <img src="logo/deshboard2.png" alt="" height="20px">
                    <a href="admin_control.php" class="sidebar-contant"> Deshboard</a>
                </div>

                <div class="side1">
                    <img src="logo/course.png" alt="" height="20px">
                    <a href="admin_courses.php" class="sidebar-contant">Course</a>
                </div>
                <div class="side1">
                    <img src="logo/lesson.png" alt="" height="20px">
                    <a href="admin_lessons.php" class="sidebar-contant">Lessons</a>
                </div>
                <div class="side1">
                    <img src="logo/person.png" alt="" height="20px">
                    <a href="student_list.php" class="sidebar-contant">Students</a>
                </div>
                <div class="side1">
                    <img src="logo/sell report.png" alt="" height="20px">
                    <a href="admin_sell_report.php" class="sidebar-contant">Sell Reports</a>
                </div>
                <div class="side1">
                    <img src="logo/feedback.png" alt="" height="20px">
                    <a href="admin_feedback.php" class="sidebar-contant">Feedback</a>
                </div>
                
                <div class="side1">
                    <img src="logo/logout.png" alt="" height="20px">
                    <a href="logout.php" class="sidebar-contant">logout</a>
                </div>
            </div>
            <div class="col-sm-10 my-3 admin-sidebarcontant">

                <div class="container my-5 all_courses">
                    <form action="course_add.php" method="post">
                        <h4 class="text-center my-5 add_course_head">Add New Course</h4>
                        <div class="mb-3 my-5">
                            <label for="course_name" class="form-label">Course name</label>
                            <input type="text" class="form-control" id="course_name" name="course_name">
                        </div>
                        <div class="mb-3">
                            <label for="course_description" class="form-label">Course Description</label>
                            <textarea name="course_description" id="course_description" cols="82" rows="1"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="course_author" class="form-label">Author Name</label>
                            <input type="text" class="form-control" id="course_author" name="course_author">
                        </div>
                        <div class="mb-3">
                            <label for="course_duration" class="form-label">Course Duration</label>
                            <input type="text" class="form-control" id="course_duration" name="course_duration">
                        </div>
                        <div class="mb-3">
                            <label for="original_price" class="form-label">Course Original Price</label>
                            <input type="text" class="form-control" id="original_price" name="original_price">
                        </div>
                        <div class="mb-3">
                            <label for="selling_price" class="form-label">Course Selling Price</label>
                            <input type="text" class="form-control" id="selling_price" name="selling_price">
                        </div>
                        <div class="mb-2">
                            <label for="course_image" class="form-label">Course Image</label>
                            <input type="file" id="course_image" name="course_image">
                        </div>
                        <div class="text-center buttons">
                            <button type="submit" class="btn btn-primary">Submit</button> &nbsp; &nbsp; &nbsp; &nbsp;
                            <a href="admin_courses.php" class="btn btn-danger">Cancel</a>
                        </div>
                        <?php
                             if($_SERVER['REQUEST_METHOD']=='POST')
                             {
                                $new_courseName=$_POST['course_name'];
                                $new_courseDesc=$_POST['course_description'];
                                $new_courseAuthor=$_POST['course_author'];
                                $new_courseDuration=$_POST['course_duration'];
                                $new_courseprice1=$_POST['original_price'];
                                $new_courseprice2=$_POST['selling_price'];
                                $myimage=$_POST['course_image'];
                                $admin_course_fetch=mysqli_query($conn,"SELECT * FROM `website_course` where Course_name='$new_courseName'");
                                $total_website_course=mysqli_num_rows($admin_course_fetch);
                                if($total_website_course==0)
                                {
                                    mysqli_query($conn,"INSERT INTO `website_course` (`Course_id`, `Course_name`, `Course_desc`, `Course_author`, `Course_img`, `Course_duration`,
                                    `Course_price`, `Course_original_price`) VALUES (NULL, '$new_courseName', '$new_courseDesc',
                                    '$new_courseAuthor', '$myimage', '$new_courseDuration', '$new_courseprice1', '$new_courseprice2');");
                                    echo '<br>';
                                  
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Congratulation</strong> Course Successfully added
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                                }
                                else{
                                    echo '<br>';
                                   
                                    echo '<script>  alert("This course is already present");</script>';
                                }                        
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
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>