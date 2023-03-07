<?php
    session_start();
    if(!isset($_SESSION['login']) || $_SESSION['login']!=True)
    
    {
        // WHEN USER COMES WITHOUT LOGIN THEN SAND INTO THE LOGIN PAGE TO ACCESS THIS PAGE
        header("location: login_page.php");
        // EXIT KAR JAYY JAB YA SUCCSSSFULL HO 
        exit;
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
    <title>KnowledgeSpot</title>
    <!--Bootstrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- google font start -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <!-- google font end -->
    <!-- Css file -->
    <link rel="stylesheet" href="css/admin_css.css">
    <link rel="stylesheet" href="css/css1.css">
    <link rel="stylesheet" href="css/feed2.css">
    <link rel="stylesheet" href="css/admin_course_css.css">
    <link rel="stylesheet" href="css/feedback_css.css">

</head>

<body>

    <!-- navigation bar Start-->
   <?php
        include "nav-bar.php";
   ?>
    <div class="col-sm-12 my-3 admin-sidebarcontant" >
                <div class="container" style="max-width: 1326px !important;">
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
                        
                    </form>
                    </tr></td>
                        ';
                    }
                ?>
                            </tbody>
                    </table>
                </div>
            </div>
   
<footer class="container-fluid" id="copyright-main" style="position:fixed;bottom:0;>
  <small id="CR">Copyright &copy; 2022 || Designed by KnowledgeSpot || <a href="admin_form.php" id="admin-link"> Admin login</a></small>
</footer>

    <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <script src="js/js1.js"></script>
</body>

</html>