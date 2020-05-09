
<?php

if(isset($_SESSION['username'])){

    $_SESSION['msg'] = "You must log in first to view this page";
    header("location: sign_in.php");
}

if(isset($_GET['logout'])){

    session_destroy();
    unset($_SESSION['username']);
    header("location:sign_in.php");
}?>



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
                        <h2>Issued Books</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-bordered">
                            <tr>
                                <th>Regis_Number</th>
                                <th>Book Title</th>
                                <th>Book Issued Date</th>
                                <th>Book return date</th>
                            </tr>
                            <?php
                                $array=mysqli_query($connection,"SELECT * FROM issue WHERE s_username='$_SESSION[student]';");
                                while ($m=mysqli_fetch_array($array)){
                                    echo "<tr>";
                                        echo "<td>";
                                            echo $m["s_regis_num"];
                                        echo "</td>";
                                        echo "<td>";
                                            echo $m["book_name"];
                                        echo "</td>";
                                        echo "<td>";
                                            echo $m["issue_date"];
                                        echo "</td>";
                                        echo "<td>";
                                         echo $m["return_date"];
                                        echo "</td>";
                                    echo "</tr>";
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
