<?php
    include "db_connect.php";
    session_start();
    if((!isset($_SESSION['login'])) && ($_SESSION['login']==False)){
        header('location:login_page.php');
    }
    else{
    header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
    // for email show
    $Used_email=$_SESSION['email'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="GENERATOR" content="Evrsoft First Page">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/course_detail_css.css">
    <title>Checkout</title>
</head>

<body>

    <div class="container mt-5" style="background-color:#e9ecef;padding-left:2rem;">
        <div class="row">
            <div class="col-sm-6 offset-sm-3 jumbotron">
                <h3 class="mb-5" style="margin-top: 5rem;
                text-align: center;font-size: 1.5rem;">Welcome to Knowledge Spot Payment Page</h3>
                <form method="post" action="my_course.php">
                    <div class="form-group row">
                        <label for="ORDER_ID" class="col-sm-4 col-form-label payment_css">Order Id</label>
                        <div class="col-sm-8">
                            <input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20"
                                name="ORDER_ID" autocomplete="off" value="<?php echo "ORDS" . rand(10000,99999999)?>"
                                readonly style="margin-bottom: .5rem;">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CUST_ID" class="col-sm-4 col-form-label payment_css">Student Email</label>
                        <div class="col-sm-8">
                            <input id="CUST_ID" class="form-control" tabindex="2" maxlength="12" size="12"
                                name="CUST_ID" autocomplete="off" value="<?php if(isset($Used_email))
                            { echo $Used_email;}?>" readonly style="margin-bottom: .5rem;">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="TXN_AMOUNT" class="col-sm-4 col-form-label payment_css">Amount</label>
                        <div class="col-sm-8">
                            <input title="TXN_AMOUNT" class="form-control" tabindex="10" type="text" name="TXN_AMOUNT"
                                value="<?php if(isset($_POST['this_course_price']))
                            { echo $_POST['this_course_price'];}?>" readonly style="margin-bottom: .5rem;">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Bought_course" class="col-sm-4 col-form-label payment_css">Course</label>
                        <div class="col-sm-8">
                            <input title="Bought_course" class="form-control" tabindex="10" type="text" name="Bought_course"
                                value="<?php if(isset($_POST['this_course_name']))
                            { echo $_POST['this_course_name'];}?>" readonly style="margin-bottom: 2.5rem;">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-8">
                            <input type="hidden" id="INDUSTRY_TYPE_ID" class="form-control" tabindex="4" maxlength="12"
                                size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-8">
                            <input type="hidden" id="CHANNEL_ID" class="form-control" tabindex="4" maxlength="12"
                                size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
                        </div>
                    </div>

                    <div class="text-center">
                        <input  type="submit" class="btn btn-primary" value="Submit">
                        <a href="all_courses.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
                <small class="form-text text-muted">Note: Complete Payment by Clicking Checkout Button</small>
            </div>
        </div>
    </div>

</body>

</html>