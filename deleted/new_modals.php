<?php
  include "db_connect.php";
?>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalcheat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
    
    <form action="index1.php" method="post">
    <h2 style="margin-left:9rem" class="mb-5" >Login Form</h2>
  <div class="mb-3 col-5">
    <label for="user" class="form-label">email</label>
    <input type="email" class="form-control" id="user" name="email_field">
  </div>
  <div class="mb-3 col-5">
    <label for="Password1" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password1" name="password_field"> 
  </div>
</form>

      </div>
      <?php
    $exists=false;
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $user_var=$_POST['email_field'];
        $pass1_var=$_POST['password_field'];
         //    password same nhi  to show password not same
        $sql_sel2=mysqli_query($conn,"SELECT * FROM `signup` where user_emailid='$user_var'");
        $total_fetch=mysqli_num_rows($sql_sel2);
        // IF WE DIRECTLY TAKE $sql_sel2 1 OR NOT TH EN IN EQUAL
        //  THAT WAS FACING SOME ERROR BECAUSE OF THAT WE FTCH THE NUMEBR OF FETCH STATEMENT
        
        // JAHA USERNAME HA BO BALA SARA ROW LA LO
        if($total_fetch==1)
       {
        while($fetch2=mysqli_fetch_assoc($sql_sel2)){
          // THAT VAERIFY_FUNTION VERIFY THAT PASSWORD YOU TYPED IS SAME AS PRESENT ROW HASH PASSWORD
          if(password_verify($pass1_var,$fetch2['user_password']))
          {
            session_start(); 
            // session is a small that contain the some sensitive information 
            // and can use anywhere in the program and other program
            $_SESSION['login']=True;
            $_SESSION['username']=$user_var;
            header("location:all_courses.php");
            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Successfully login</strong>
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
        }
          }
        }
        else{
      
          echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Warning!</strong> This username and password is wrong!!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
           }

        // after login where you want to want to transfer
       
      
}
?>
      <div class="modal-footer">
      <input type="submit" value="login" style="color: white;padding: .25rem 0.8rem;font-weight: 550;border-color: #dc3545;border-radius: 0.8rem;background-color: #dc3545;">
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- LOGIN FORM -->

