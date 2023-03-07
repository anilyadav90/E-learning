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
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="index1.php">
                            <strong>Home</strong>
                         </a>
                        
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="my_course.php">
                            <strong>Courses</strong>
                         </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



<div class="container-fluid my-5" style="margin-left:10rem;padding-right:20rem;">
<div class="accordion">
  <div class="accordion-item my-5" >
  <?php
                    $lecture_course_var=$_GET['lecture_course'];
                    $fetch_data_lessondb=mysqli_query($conn,"SELECT * FROM `lessons` where  Course_Name1='$lecture_course_var'");
                    $num2=1;
                    while($fetch_data_lessondb_row=mysqli_fetch_assoc($fetch_data_lessondb))
                    {
                        $alternative_lessonlink_var=$fetch_data_lessondb_row['lesson_link'];
                        $alternative_store_lesson=$fetch_data_lessondb_row['lesson_name'];
                        $alternative_store_content=$fetch_data_lessondb_row['lesson_desc'];
                        
                    echo'    <h2 class="accordion-header">
                        <button class="accordion-button my-1" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#panelsStayOpen-collapse" 
                        aria-controls="panelsStayOpen-collapse" style="color: white; background-color: #dd1236;font-weight: 600;color:white">
                        lecture &nbsp;'.$num2.':&nbsp;&nbsp;'.$alternative_store_lesson.'
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapse" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <video height="400" width="900" controls class="my-5 mx-5"><source src="video/'.$alternative_lessonlink_var.'" 
                            type="video/mp4" class="lectures_videos">Video not Supported on your system</video>
                        </div>
                        <div class="container-fluid content-file bg-success py-3">
                        <a href="course_content_pdf/'.$alternative_store_content.'" style="color:white; font-weight:600;">Download lecture Content</a>
                    </div>
                      </div>';
                     
                       $num2++;
                    }
                    
                ?>
                
  </div>  
</div>
</div>

    
    
    <!-- jquary and bootsrap and popper for javascript -->

    <footer class="container-fluid" id="copyright-main" style="  position: fixed; bottom: 0;">
        <small id="CR">Copyright &copy; 2022 || Designed by KnowledgeSpot</small>
    </footer>

    <script src="js/lectures.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous">
    </script> 
    <script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity = "sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin = "anonymous" >
     </script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>