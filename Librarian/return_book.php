

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
                        <h2>Return Book</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="" method="POST">
                            <table class="table table-bordered">
                                <tr>
                                    <?php
                                    $sql=mysqli_query($connection,"SELECT `s_regis_num` FROM `issue` WHERE `return_date`='' ;");
                                    ?>
                                    <td>
                                        <select name="s_regis_num" class="form-control">
                                            <?php
                                            while ($m=mysqli_fetch_array($sql)){
                                                echo "<option>";
                                                echo $m['s_regis_num'];
                                                echo "</option>";
                                            }

                                            ?>

                                        </select>
                                    </td>
                                    <td>
                                        <input class="form-control btn btn-dark" type="submit" name="submit1" value="Search">
                                    </td>
                                </tr>
                            </table>
                        </form>

                        <table class="table table-bordered">
                            <tr>
                                <th>Regis_Num</th>
                                <th>Name</th>
                                <th>Grade</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Book Name</th>
                                <th>Issue Date</th>
                                <th>Username</th>
                                <th>Issued Librarian</th>
                                <th>If Return?</th>
                            </tr>
                            <?php
                            if (isset($_POST["submit1"])){
                                $sql2=mysqli_query($connection,"SELECT * FROM `issue` WHERE (`s_regis_num`='$_POST[s_regis_num]') and (`return_date`='');");
                                while ($mm=mysqli_fetch_array($sql2)){
                                    echo "<tr>";
                                        echo "<td>";
                                            echo $mm["s_regis_num"];
                                        echo "</td>";
                                        echo "<td>";
                                            echo $mm["s_name"];
                                        echo "</td>";
                                            echo "<td>";
                                        echo $mm["s_grade"];
                                            echo "</td>";
                                        echo "<td>";
                                            echo $mm["s_address"];
                                        echo "</td>";
                                        echo "<td>";
                                            echo $mm["s_email"];
                                        echo "</td>";
                                        echo "<td>";
                                            echo $mm["book_name"];
                                        echo "</td>";
                                        echo "<td>";
                                            echo $mm["issue_date"];
                                        echo "</td>";
                                        echo "<td>";
                                            echo $mm["s_username"];
                                        echo "</td>";
                                        echo "<td>";
                                            echo $mm["librarian"];
                                        echo "</td>";
                                        echo "<td>" ;?>
                                            <a href="return_book_fun.php?id=<?php echo $mm["id"];?>">Return</a>
                                        <?php echo "</td>";
                                    echo "</tr>";
                                }
                            }
                            ?>

                        </table>

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





