<?php
$id=$_GET["id"];
include '../utility/connection.php';

?>


<?php

if(isset($_SESSION['username'])){

    $_SESSION['msg'] = "You must log in first to view this page";
    header("location: sign_in.php");
}

if(isset($_GET['logout'])){

    session_destroy();
    unset($_SESSION['username']);
    header("location:sign_in.php");
}


?>

<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>Document</title>-->
<!--</head>-->
<!--<body>-->
<!--    hi-->
<!--</body>-->
<!--</html>-->
<?php
include("header.php");
?>

<?php
$array=mysqli_query($connection,"SELECT * FROM `student_info` WHERE `id`='".$id."';");
$m=mysqli_fetch_array($array);

?>

<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3></h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Student</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form method="post" action="">
                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <label>Register_Number</label>
                                        <input class="form-control" type="text" value="<?php echo $m['regis_num']?>"
                                            name="regis_num">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>First_Name</label>
                                        <input class="form-control" type="text" value="<?php echo $m['firstname']?>"
                                            name="firstname">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Last_Name</label>
                                        <input class="form-control" type="text" value="<?php echo $m['lastname']?>"
                                            name="lastname">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Username</label>
                                        <input class="form-control" type="text" value="<?php echo $m['username']?>"
                                            name="username">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Grade</label>
                                        <input class="form-control" type="text" value="<?php echo $m['grade']?>"
                                            name="grade">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Address</label>
                                        <input class="form-control" type="text" value="<?php echo $m['Address']?>"
                                            name="Address">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Email</label>
                                        <input class="form-control" type="text" value="<?php echo $m['email']?>"
                                            name="email">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>NIC</label>
                                        <input class="form-control" type="text" value="<?php echo $m['nic']?>"
                                            name="nic">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-control btn btn-primary" name="submit1" type="submit"
                                            value="Edit">
                                    </td>
                                </tr>


                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
if (isset($_POST['submit1'])){
    $regis_num=$_POST["regis_num"];
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $username=$_POST["username"];
    $grade=$_POST["grade"];
    $Address=$_POST["Address"];
    $email=$_POST["email"];
    $nic=$_POST["nic"];
    $query2="UPDATE `student_info` SET `regis_num`='".$regis_num ."',`firstname`='".$firstname ."',`lastname`='".$lastname ."',`username`='".$username."' ,`grade`='".$grade ."' ,`Address`='".$Address ."',`email`='".$email ."' ,`nic`='".$nic ."' WHERE `id`='".$id."'";
    if ($m=mysqli_query($connection,$query2)){
        echo '<script type="text/javascript">;';
        echo 'alert("Updated Succefully");';
        echo 'window.location="display_student_info.php" ;';
        echo '</script>';
    }
}

?>
<?php
include("footer.php");
?>