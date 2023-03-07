

<?php
    session_start();
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
    <?php
  include('./nav-bar.php')
?>
    <br><br>
    <div class="container my-5 ">
        <?php
      if($_SERVER['REQUEST_METHOD']=='POST')
      {
       $AdminName=$_POST['InputAdminName'];
       $AdminEmail=$_POST['InputAdminEmail'];
       $AdminPassword=$_POST['InputAdminPassword'];
       $admin_access=False;
       $admin_data_fetch=mysqli_query($conn,"SELECT * FROM `admin_data` where Admin_Name='$AdminName' && Admin_Email='$AdminEmail' && Admin_Password='$AdminPassword'");
       $num_rows2=mysqli_num_rows($admin_data_fetch);
       if($num_rows2>=1)
       {
        $admin_access=True;
        $_SESSION['admin_login']=True;
        header('location:admin_control.php');
       }
       
       
      }

    ?>
    </div>

    <div class="container my-5 a_form">
        <h2 style="padding-top:2rem;font-weight:600">Admin login form</h2>
        <form action="admin_form.php" method="post" class="Admin_Form2">
            <div class="mb-3">
                <label for="exampleadminName1" class="form-label">Name</label>
                <input type="text" class="form-control admin_input" id="exampleadminName1" name="InputAdminName">
            </div>
            <div class="mb-3">
                <label for="exampleAdminEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control admin_input" id="exampleAdminEmail1" aria-describedby="emailHelp"
                    name="InputAdminEmail">
            </div>
            <div class="mb-3">
                <label for="exampleAdminPassword1" class="form-label">Password</label>
                <input type="password" class="form-control admin_input" id="exampleAdminPassword1" name="InputAdminPassword">
            </div>

            <button type="submit" class="btn admin-sub-btn">Submit</button>
        </form>
    </div>


    <?php
include('./footer.php')
?>
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