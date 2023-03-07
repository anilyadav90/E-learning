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
    <link rel="stylesheet" href="css/admin_course_css.css">
    <link rel="stylesheet" href="css/feedback_css.css">


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
            <div class="col-sm-10 my-3 admin-sidebarcontant">
                <div class="container">
                    <table class="table table-hover my-5" id="userFeedback">

                        <thead>
                        <?php
                                    if($_SERVER['REQUEST_METHOD']=='POST')
                                    {
                                        $deleted_Feedid=$_POST['del_course_feed'];

                                        mysqli_query($conn,"DELETE FROM `feedback` WHERE `feedback`.`User_id1` = '$deleted_Feedid'");
                                        echo'<script> alert("Successfully deleted");</script>';
                                    }
                                    else{

                                    }
                            ?>
                            <tr>
                                <th scope="col" class="feedback_rowHead">User name</th>
                                <th scope="col" class="feedback_rowHead">User Email</th>
                                <th scope="col" class="feedback_rowHead">User Course</th>
                                <th scope="col" class="feedback_rowHead">Comment</th>
                                <th scope="col" class="feedback_rowHead">Action</th>
                            </tr>
                            <?php
                    $feedback_fetch=mysqli_query($conn,"SELECT * FROM `feedback`");
                    while($feedback_row_fetch=mysqli_fetch_assoc($feedback_fetch))
                    {
                        echo '  <tr>
                        <td scope="col">'.$feedback_row_fetch['FeedbackUser_name1'].'</td>
                        <td scope="col">'.$feedback_row_fetch['User_Email1'].'</td>
                        <td scope="col">'.$feedback_row_fetch['User_Course'].'</td>
                        <td scope="col">'.$feedback_row_fetch['Comment'].'</td>
                        <td><form action="admin_feedback.php" method="post" style="display:inline">
                        <input type="hidden" name="del_course_feed" value='.$feedback_row_fetch['User_id1'].'>
                        <button type="submit" class="btn btn-danger mr-3" name="view_feed" value="delete_feed" style="display:inline">
                            <img src="logo/delete2.png" alt="" height="20px" style="display:inline">
                    </button>
                    </form>
                    </tr></td>
                        ';
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