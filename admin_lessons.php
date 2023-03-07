
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
            <div class="col-sm-10 my-3 admin-sidebarcontant lesson_main_head">
                
                <div class="container my-5">
                    <form class="lesson_form" action="admin_lessons.php" method="post">
                        <label for="find_lesson_id" class="find_lesson_label">Enter Course Id:</label>
                        <input type="text" name="find_lesson" id="find_lesson_id" placeholder="Enter Course id">
                        <button type="submit" class="btn btn-danger find_button">Search</button>
                        <?php
                        if($_SERVER['REQUEST_METHOD']=='POST')
                            {
                                $find_course_id=$_POST['find_lesson'];
                                $fetch_course_id=mysqli_query($conn,"SELECT Course_name FROM `website_course` 
                                where Course_id='$find_course_id'");
                                $total_fetch_course_id=mysqli_num_rows($fetch_course_id);
                                // if id 1 present ho to
                                if($total_fetch_course_id==1)
                                {
                                    while($found_row=mysqli_fetch_assoc($fetch_course_id))
                                    {
                                    $fetch_course_name=$found_row['Course_name'];
                                    $fetch_found_courseName=mysqli_query($conn,"SELECT * FROM `lessons` where Course_Name1='$fetch_course_name'");
                                    $lesson_course_name=mysqli_num_rows($fetch_found_courseName);
                                    if($lesson_course_name>=1){
                                    echo'<div class="my-5 container-fluid bg-dark text-light text-center" 
                                    style="padding-top:.6rem;padding-bottom:.6rem; font-weight:bold; border-radius:2rem;">'.$found_row['Course_name'].' lesson list
                                    </div>';
                                    echo'<table class="table">
                                    <thead>
                                        <tr class="bg-dark text-light">
                                            <th scope="col">lesson Name</th>
                                            <th scope="col">lesson Description</th>
                                            <th scope="col">lesson Video</th>
                                           
                                             </tr>
                                    </thead>
                                    <tbody>'; 
                                    while($lessons_rows=mysqli_fetch_assoc($fetch_found_courseName))
                                     {
                                        echo' 
                                        <tr>
                                        <td style="color:white;font-weight:500;">'.$lessons_rows['lesson_name'].'</td>
                                        <td style="color:white;font-weight:500;"'.$lessons_rows['lesson_desc'].'</td>
                                        <td style="color:white;font-weight:500;">'.$lessons_rows['lesson_link'].'</td>
                                        
                                    </tr>
                                       ';
                                    }
                                    echo' </tbody>
                                    </table>';
                                }
                                else{
                                    echo '<div class="alert alert-danger my-5 text-center" role="alert" style="font-weight:bold; border-radius:1rem;">
                                            In this Course does not have any lessson
                                  </div>';
                                }
                                    }
                                }
                                else{
                                    echo '<div class="alert alert-danger my-5 text-center" role="alert" style="font-weight:bold;border-radius:1rem;">
                                    Wrong Course Id
                                  </div>';
                                }
                              }
                         ?>
                        
                    </form></div>

                
                <a href="lesson_add.php"><img src="logo/add.png" alt="" height="60px" class="add_course"></a>
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