<?php
    session_start();
    if((!isset($_SESSION['admin_login'])) && ($_SESSION['admin_login']==False)){
        header('location:admin_form.php');
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

</head>

<body>
    <?php
        include "admin_navbar.php";

?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 my-3 admin-sidebar">
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
                    <img src="logo/feedback.png" alt="" height="20px">
                    <a href="admin_feedback.php" class="sidebar-contant">Feedback</a>
                </div>
                <div class="side1">
                    <img src="logo/logout.png" alt="" height="20px">
                    <a href="logout.php" class="sidebar-contant">logout</a>
                </div>
            </div>
            <div class="col-sm-10 my-3 text-center">

                <div class="admin-sidebarcontant">

                <div class="card admin-card1" style="width: 18rem;">
                    <div class="card-body">
                        <h6 class="card-title text-center admin-conhead">Course</h6>
                        <hr>
                        <p class="card-text text-center admin-con1part1">11</p>
                        <h6 class="card-subtitle mb-2  text-center admin-con1part2">View</h6>

                    </div>
                </div>

                <div class="card admin-card2" style="width: 18rem;">
                    <div class="card-body">
                        <h6 class="card-title text-center admin-conhead">Students</h6>
                        <hr>
                        <p class="card-text text-center admin-con1part1">28</p>
                        <h6 class="card-subtitle mb-2  text-center admin-con1part2">View</h6>


                    </div>
                </div>

               
            </div>
                <div class="text-center admin_course_head text-light my-5" 
                style="font-size:2rem;border-radius:2rem;background-color:#008b8b;">
                        list of Courses
                    
                </div>
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Course Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Author </th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                    if($_SERVER['REQUEST_METHOD']=='POST')
                                    {
                                        $deleted_id=$_POST['del_course'];
                                        mysqli_query($conn,"DELETE FROM `website_course` WHERE `website_course`.`Course_id` = '$deleted_id'");
                                        echo'<script> alert("Course Successfully deleted");</script>';
                                        echo'<meta http-equiv="refresh" content="0; url=?deleted"/>';
                                    }
                                    else{

                                    }
                            ?>
                        <?php
                               $show_course=mysqli_query($conn,"SELECT * FROM `website_course`");
                                while($course_row=mysqli_fetch_assoc($show_course)){
                                    echo'<tr>
                                    <th scope="row">'.$course_row['Course_id'].'</th>
                                    <td>'.$course_row['Course_name'].'</td>
                                    <td>'.$course_row['Course_author'].'</td>
                                    <td> 
                                        <form action="admin_courses.php" method="post" style="display:inline">
                                            <input type="hidden" name="del_course" value='.$course_row['Course_id'].'>
                                            <button type="submit" class="btn btn-danger mr-3" name="view" value="view" style="display:inline">
                                            <img src="logo/delete2.png" alt="" height="20px" style="display:inline">
                                        </button>
                                    </form>
                                    </td>
                                </tr>';
                                }
                            ?>
                            
                            
                        </tbody>
                    </table>
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