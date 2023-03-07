
<?php
session_start();
if(isset($_SESSION['login']) && $_SESSION['login']==True)
    {
        $exist_login=True;
    }
    else{
        $exist_login=False;
    }



echo'
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
                        <a class="nav-link text-light text-center" href="#courses_list"> <strong> Courses</strong></a>
                    </li>
                
                    <li class="nav-item">
                        <a class="nav-link text-light text-center" href="myprofile.php"><strong>MyProfile</strong></a>
                    </li>';
                    
                    if($exist_login){
                    echo'
                    <li class="nav-item">
                        <a class="nav-link text-light text-center" href="logout.php"><strong>logout</strong></a>
                    </li>';}
                    
                    if(!$exist_login){
                        echo'
                    <li class="nav-item">
                        <a class="nav-link text-light text-center" href="login_page.php"><strong>login</strong></a>
                    </li>
                        
                    <li class="nav-item">
                        <a class="nav-link text-light text-center" href="#" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1"><strong>Signup</strong></a>
                    </li>';}
                    echo'
                    <li class="nav-item">
                        <a class="nav-link text-light text-center" href="#id1"><strong>Popular Feedbacks</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light text-center" href="#form-part"><strong>Contact</strong></a>
                    </li>';
                    echo '<li class="nav-item">
                    <a class="nav-link text-light text-center" href="user_feedbacks.php"><strong>Feedbacks</strong></a>
                </li>';
               echo' </ul>
            </div>
        </div>
    </nav>
</div>';
?>