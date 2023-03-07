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
    <!-- Css file -->course_detail_css.css
    <link rel="stylesheet" href="css/css1.css">
    <link rel="stylesheet" href="css/course_detail_css.css">

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
                            <a class="nav-link text-light text-center" href="#"><strong>MyProfile</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="logout.php"><strong>logout</strong></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
   
    <br><br>
    <div class="container">
        <div class="card mb-3 course_detail_card" style="max-width: 540px;">

            <?php
            $This_courseRequest=$_GET['thiscourse'];
             $fetch_detail=mysqli_query($conn,"SELECT * FROM `website_course` where Course_name='$This_courseRequest'");
             while($fetch_detailsRow=mysqli_fetch_assoc($fetch_detail))
             {
                    echo '<div class="row g-0">';
                    echo '<div class="col-md-4">';
                      echo '<img src="image/'.$fetch_detailsRow['Course_img'].'" class="img-fluid rounded-start course_detail_img" alt="..." style="max-width: 101%;
                         height: 12.8rem;margin-right:2rem">';
                   echo '</div>';
                    echo '<div class="col-md-8">';
                        echo '<div class="card-body">';
                            echo '<h5 class="card-title course_details">Course Name:&nbsp; '.$fetch_detailsRow['Course_name'].'</h5>';
                            echo '<p class="card-text course_details">'.$fetch_detailsRow['Course_desc'].'</p>';
                            echo '<p class="card-text course_details"><small class="text-muted">Duration: '.$fetch_detailsRow['Course_duration'].'</small></p>';
                            echo '<span style="font-weight:bold;" class="course_details">Price:</span>';
                            echo '<span style="font-weight:bold;">₹<del>'.$fetch_detailsRow['Course_price'].'/-</del>'.$fetch_detailsRow['Course_original_price'].'/-</span>';
                             echo'   <form action="course_content.php" method="post">';
                             echo' <input type="hidden" name="this_course_name" value="'.$This_courseRequest.'">';
                             echo' <input type="hidden" name="this_course_price" value='.$fetch_detailsRow['Course_original_price'].'>';
                                echo '<button type="submit" class="btn btn-primary course_buyBtn" name="buy"
                            style="font-weight:bold;">Buy Course</button>';
                        echo '</div>
                                </form>
                            
                    </div>
                </div>';
    
             }

        ?>
            <table class="table table-hover my-3">
                <thead>
                    <tr class="bg-primary">
                        <th scope="col" class="text-light">Lesson No</th>
                        <th scope="col" class="text-light">Lesson Name</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $lesson_id=1;
                        $fetch_lesson_rows=mysqli_query($conn,"SELECT * FROM `lessons` where Course_Name1='$This_courseRequest'");
                        while($fetch_lesson_items=mysqli_fetch_assoc($fetch_lesson_rows))
                        {
                            $ids=$lesson_id++;
                            echo' <tr>
                            <th scope="row">'.$ids.'</th>
                            <td>'.$fetch_lesson_items['lesson_name'].'</td>
                        </tr>';
                        }
                   ?>
                   

                </tbody>
            </table>
        </div>
    </div>

    <br>

    <footer class="container-fluid" id="copyright-main" style="position:fixed; bottom:0;">
  <small id="CR">Copyright &copy; 2022 || Designed by KnowledgeSpot</small>
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