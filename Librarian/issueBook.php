

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
include ("connection.php");
?>

<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Issue book</h3>
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
                        <h2></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form method="post" action="">
                            <table>
                                <tr>
                                    <td>
                                        <?php $query="SELECT `regis_num` FROM `student_info`;";
                                        $array=mysqli_query($connection,$query)?>
                                        <select name="regis_num">
                                            <?php
                                                while ($m=mysqli_fetch_array($array)){
                                                    echo "<option>";
                                                    echo $m['regis_num'];
                                                    echo "</option>";
                                                }

                                            ?>

                                        </select>

                                    </td>
                                    <td>
                                       <input type="submit" value="Search" name="submit1" class="form-control btn btn-default" style="margin-top: 5px;">
                                    </td>
                                </tr>
                            </table>
                        </form>
                            <?php
                            if (isset($_POST['submit1'])) {
                                $sql = "SELECT * FROM `student_info` WHERE `regis_num`='$_POST[regis_num]';";
                                $array2 = mysqli_query($connection, $sql);
                                $s_regis_num = $name = $s_grade = $s_address = $s_email = $s_username = '';
                                while ($mm = mysqli_fetch_array($array2)) {
                                    $s_regis_num = $mm["regis_num"];
                                    $s_name = $mm["firstname"];
                                    $s_grade = $mm["grade"];
                                    $s_address = $mm["Address"];
                                    $s_email = $mm["email"];
                                    $s_username = $mm["username"];
                                }
                                ?>
                        <form action="" method="POST">
                            <table class="table table-bordered">
                                <tr>

                                    <td><label>Register_Number</label><input class="form-control" name="s_regis_num"
                                               value="<?php echo $s_regis_num; ?>" ></td>
                                </tr>
                                <tr>

                                    <td><label>Name</label><input class="form-control" name="s_name" value="<?php echo $s_name; ?>"
                                               ></td>
                                </tr>
                                <tr>

                                    <td><label>Grade</label><input class="form-control" name="s_grade" value="<?php echo $s_grade; ?>"
                                               ></td>
                                </tr>
                                <tr>

                                    <td><label>Address</label><input class="form-control" name="s_address" value="<?php echo $s_address; ?>"
                                               ></td>
                                </tr>
                                <tr>

                                    <td><label>Email</label><input class="form-control" name="s_email" value="<?php echo $s_email; ?>"
                                               ></td>
                                </tr>
                                <tr>
                                    <td><select class="form-control" name="title">
                                            <label>Book Title</label>
                                            <?php

                                            $array3 = mysqli_query($connection, "SELECT `title` FROM `books_details`");
                                            while ($mmm = mysqli_fetch_array($array3)) {
                                                echo "<option>";
                                                echo $mmm['title'];
                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td>
                                        <label>Issue Date</label>
                                        <?php
                                        $a=date("d-m-Y");
                                        ?>
                                        <input class="form-control" type="text" name="issue_date" placeholder="dd-mm-yyyy" value="<?php echo $a; ?>">
                                    </td></tr>
                                <tr>
                                    <td><input class="form-control" name="s_username" value="<?php echo $s_username; ?>"
                                               ></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" name="submit_2" class="form-control btn btn-primary" style="margin-top: 5px;">
                                    </td>
                                </tr>
                            </table>
                        </form>
                            <?php }
                            ?>
                        <?php
                        if (isset($_POST['submit_2'])){
                            $sql2="INSERT INTO `issue` VALUES ('','$_POST[s_regis_num]','$_POST[s_name]','$_POST[s_grade]','$_POST[s_address]','$_POST[s_email]','$_POST[title]','$_POST[issue_date]','','$_POST[s_username]','$_SESSION[librarian]');";
                            mysqli_query($connection,$sql2); ?>
                            <script type="text/javascript">
                                alert("Issued Succefully");
                                Window.location("issueBook.php")
                            </script>
                        <?php }

                        ?>










                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->



<?php
include("footer.php");
?>




