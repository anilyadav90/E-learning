
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
    <link rel="stylesheet" href="css/feed2.css">
</head>

<body>

 <?php
  include "nav-bar.php";
?>
    <!-- Main page -->
    <div class="container-fluid" id="backvideo">
        <div class="vid-parent">
            <video height="780px" width="1349px" autoplay="autoplay" id="vid" loop>
                <source src="video/first-background.mp4" />
            </video>
            <div class="overlap">
            </div>
            <div class="content">
                <h3 class="content1" id="vid-con1">
                    Knowledge Spot
                </h3>
                <br>
                <p class="content1" id="vid-con2">
                    Learn and Implement
                </p>
                <br>
                <a id="btn" href="#courses_list">Get Started</a>
            </div>
        </div>
    </div>
    <?php
    // Main page end

// Banner Start
include('./banner1.php');
?>
<!-- Banner end -->

<!-- Main Content Start-->
    <div class="cover2">
        <div class="container" id="courses_list">
            <h1 class="text-center text-light" id="courses-head">Popular Courses</h1>
            <?php
  include('./Course.php');
?>
<!-- Main Content End-->
            <br>
            <br>

            <!-- Course Start -->
            <div class="container text-center">
                <a type="button" class="btn btn-danger" href="all_courses.php"><strong>All Courses>></strong></a>
            </div>
   




            
<div class="cover3">
    <div class="container" id="contact-box1">
        <div class="row">
            <div class="col-sm-3 contact-part1">
                <img src="logo/email.webp" alt="" id="email-logo2">
                <h6 class="footerhead">Contact Us</h6>
                <ul class="category-list align-item">
                    <li class="Contact-item3" id="head-in-form">Knowledge Spot</li>
                    <li class="Contact-item3">Contact no: 7927638527</li>
                    <li class="Contact-item3">Contact no: 6756657965</li>
                    <li class="Contact-item3">Whatsapp no: 8556955765</li>
                    <li class="Contact-item3"></li>
                </ul>
                <p id="contact-sidepart3">
                    You can massage and call anytime under morning 10:00 am to 08:00 pm
                </p>
            </div>


            <div class="col-sm-9" id="form-part">
                <form action="index1.php" method="post" id="contact-form2">
                    <h1 id="contact-head5">Feedback Form</h1>
                    <br>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label ml-3 text-dark">Name</label> <br>
                        <input type="text" placeholder="     Enter your name" class="data" name="feedbackName">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputCourse" class="form-label text-dark">Course</label> <br>
                        <input type="text" placeholder="     Enter your Course name" class="data" name="feedbackCourse">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-dark">Email address</label> <br>
                        <input type="email" placeholder="     Enter your Email" class="data" name="feedbackEmail">

                    </div>

                    <div class="mb-3">
                        <label for="exampleComment" class="form-label text-dark">Comment</label><br>
                        <Textarea class="data" placeholder="     Enter your feedback" name="feedbackComment"></Textarea>
                    </div>
                    <input type="reset" value="Clear" id="reset1">
                    <!-- <button type="submit" class="btn btn-primary" id="contact-btn">Submit</button> -->
                    <input type="submit" value="Submit" id="contact-btn">
                </form>
            </div>
        </div>
    </div>
    <!-- </div> -->
</div>

<?php
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
          $feed_username=$_POST['feedbackName'];
          $feed_usercourse=$_POST['feedbackCourse'];
          $feed_useremail=$_POST['feedbackEmail'];
          $feed_usercomment=$_POST['feedbackComment'];

          mysqli_query($conn,"INSERT INTO `feedback` (`User_id1`, `FeedbackUser_name1`, `User_Email1`, `User_Course`, `Comment`, `User_feedbackTime`) VALUES (NULL, '$feed_username', '$feed_useremail', '$feed_usercourse', '$feed_usercomment', current_timestamp());");
        }


    ?>









        </div>
        <!-- Course End-->

        <!-- Feedback Start -->
        <div class="container-fluid main-feed" id="id1">
            <div class="view-box">
                <div class="testimonials">
                    <div class="user">
                        <img src="css/user_pic1.jpg" alt="" height="80px" width="80px" class="feed-img1">
                        <p class="feed-para"> <strong>When I need courses on topics that my university doesn't offer,
                                KnowledgeSpot is one of the best
                                places to go..</strong></p>
                        <br>
                        <h5 class="feed-head">Jackson </h5>
                    </div>
                    <div class="user c2">
                        <img src="css/feed-user2.jpg" alt="" height="80px" width="80px" class="feed-img1">
                        <p class="feed-para"><strong>
                                I've been leading a happier life since I discovered KnowledgeSpot. The courses and
                                knowledge
                                helped me become more comfortable and confident..</strong></p>
                        <br>
                        <h5 class="feed-head">george varghe</h5>
                    </div>
                    <div class="user">
                        <img src="css/feed-user4.jpg" alt="" height="80px" width="80px" class="feed-img1">
                        <p class="feed-para"><strong>My courses taught me to pick up new ideas quickly and apply them to
                                real-world problems. Today,
                                my certificates make me stand out from the crowd..</strong></p>
                        <br>
                        <h2 class="feed-head">Alina </h2>
                    </div>
                </div>
            </div>
            <div class="controls">
                <span id="control1" onclick="show1()"></span>
                <span id="control2" class="active" onclick="show2()"></span>
                <span id="control3" onclick="show3()"></span>
            </div>
        </div>
        <!-- Feedback End -->
        <!-- Js file start -->
        <script src="js/feed1.js"></script>
        <!-- Js file End-->

        <!-- banner2 Start -->
        <?php
  include('./banner2.php')
?>
<!-- banner2 End -->
      <!-- About Start -->
        <div class="container-fluid " id="other-section">
            <div class="row">
                <div class="col-sm-4">
                    <h6 class="footerhead">About Us</h6>
                    <p class="foot-con1">Knowledge Spot provides the world best courses that helps to improve your skill
                        and
                        knowledge and also a cost-effective.</p>
                </div>
                <div class="col-sm-4 about-us-con">
                    <h6 class="text-center footerhead">Category</h6>
                    <ul class="category-list">
                        <li class="category-item">HTML</li>
                        <li class="category-item">Artificial Intelligence</li>
                        <li class="category-item">CSS</li>
                        <li class="category-item">Javascript</li>
                        <li class="category-item">Python</li>
                        <li class="category-item">C++</li>
                    </ul>
                </div>
                <div class="col-sm-4 about-us-con">

                    <ul class="category-list2">
                        <li class="category-item2">Bootstrap</li>
                        <li class="category-item2">MySql</li>
                        <li class="category-item2">Data Science</li>
                        <li class="category-item2">Cloud computing</li>
                        <li class="category-item2">Machine Learning</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Footer Start -->
       <?php
include('./footer.php')
?>
 <!-- Footer End -->

<!-- Signup Modals Start -->
 <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Student Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="index1.php" method="POST">
  <div class="mb-3">
    <img src="logo/email.webp" alt="" class="sign-img1">
    <p id="sign-item2">Email</p>
    <input type="email" class="form-control" id="signup-email" aria-describedby="emailHelp" placeholder="Enter your Email" name="user_email">
  </div>
  <div class="mb-3">
    <img src="logo/key.png" alt="" class="sign-img1">
    <p id="sign-item3">Password</p>
    <input type="password" class="form-control" id="signup-password" placeholder="Enter password" name="password1">
  </div>
  <div class="mb-3">
    <img src="logo/key.png" alt="" class="sign-img1">
    <p id="sign-item1">Confirm password</p>
    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Enter password" name="password2">
  </div>
 </div> 
 

      <!-- signup  php Start -->  
    <?php
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    $exists=False;
                    $signup_email=$_POST['user_email'];
                    $signup_password1=$_POST['password1'];
                    $signup_password2=$_POST['password2'];
                    $sql_sel1=mysqli_query($conn,"SELECT * FROM `signup` where user_emailid='$signup_email'");
                    $row_num=mysqli_num_rows($sql_sel1);
                    if($row_num>=1)
                    {
                        $exists=True;
                    }
                    
                    if (($signup_password1==$signup_password2) && ($exists==False))
                    {
                        $_SESSION['signup']=True;
                        $encrypte_password=password_hash($signup_password1,PASSWORD_DEFAULT);
                        mysqli_query($conn,"INSERT INTO `signup` (`user_id`, `user_emailid`, `user_password`, `time`) VALUES (NULL, '$signup_email', '$encrypte_password', current_timestamp());");
                        mysqli_query($conn,"INSERT INTO `profile_list` (`profile_id`, `profileUser_Email`) VALUES (NULL, '$signup_email');");
                        echo'<div class="alert alert-success alert-dismissible fade show alert-sign" role="alert">
                          <strong>Congratulation!</strong> Account Successfully Created
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    else{
                        if($exists==True)
                        {
                            echo'<div class="alert alert-danger alert-dismissible fade show alert-sign" role="alert">
                          <strong>Warning!</strong> This Email Already used !! try another Email
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        }
                        if($signup_password1!=$signup_password2){
                            echo'<div class="alert alert-danger alert-dismissible fade show alert-sign" role="alert">
                          <strong>Warning!</strong>Check your Password!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        }
                        
                    }
                }
                ?>
      <div class="modal-footer">
        <input type="submit" value="Signup" style="color: white;padding: .25rem 0.8rem;font-weight: 550;border-color: #dc3545;border-radius: 0.8rem;background-color: #dc3545;">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="color: white;padding: .3rem 0.8rem;font-weight: 550;border-color: #dc3545;border-radius: 0.8rem;background-color: #dc3545;">Close</button>
      </div> 
              </form>  
    </div>
  </div>
</div>

<!-- signup end -->
 <!-- jquary and bootsrap and popper for javascript -->

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


