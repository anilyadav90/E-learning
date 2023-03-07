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
    <link rel="stylesheet" href="css/css1.css">

</head>

<body>

    <!-- navigation bar Start-->
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
                            <a class="nav-link text-light text-center" href="myprofile.php"><strong>MyProfile</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="logout.php"><strong>logout</strong></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <li class="nav-item">
        <a class="nav-link text-light" href="logout.php">logout</a>
    </li>
    <br><br>
    <div class="all_cards" style="padding-bottom:2rem;margin-top:-2rem">
   
        <h2 class="text-center text-light py-5">All Courses</h2>
    
    <?php
            echo '<div>';
            $fetch_course=mysqli_query($conn,"SELECT * FROM `website_course`");
            while($fetch_CourseRow=mysqli_fetch_assoc($fetch_course))
            {
                echo '<div class="card course1" style="width: 18rem;margin-left:2.4rem;">';
                echo '<a href="index.php" class="course-anchor">';
                  echo '<img src="image/'.$fetch_CourseRow['Course_img'].'" class="card-img-top" alt="..." id="c-img1"/>';
                echo '</a>';
                echo '<div class="card-body">';
                    echo '<h5 class="card-title title1">'.$fetch_CourseRow['Course_name'].'</h5>';
                   echo'<p class="card-text C-Article1">
                       '.$fetch_CourseRow['Course_desc'].'
                    </p>';
                   echo '<hr/>';
                    echo '<b class="blue-line">Price:</b>';
                   echo '<del class="blue-line">₹/'.$fetch_CourseRow['Course_price'].'-</del>';
                  echo'<b class="blue-line">₹'.$fetch_CourseRow['Course_original_price'].'/-</b>';
                    echo '<a href="Course_details.php?thiscourse='.$fetch_CourseRow['Course_name'].'" class="btn btn-primary btn1">Enroll</a>';
                echo '</div>';
            echo '</div>';

            }
            echo '</div>';
        ?>
        
        </div>
   <br>
   
<footer class="container-fluid" id="copyright-main" style="margin-top: -2rem;">
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