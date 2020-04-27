<?php
    include("connection.php");
    include("header.php");
?>

<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Plain Page</h3>
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
                        <h2>Plain Page</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php

$sql="SELECT * FROM `student_info`";
$array=mysqli_query($connection,$sql);

$id=$firstname=$lastname=$username=$email=$nic=$status='';
?>
                        <table class="table table-bordered">
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>NIC</th>
                                <th>Status</th>
                                <th>Approve</th>
                                <th>Not Approve</th>
                            </tr>
                            <tr>
                                <?php while ($m=mysqli_fetch_array($array)):?>
                                <td><?php echo $m['id'] ?></td>
                                <td><?php echo $m['firstname'] ?></td>
                                <td><?php echo $m['lastname'] ?></td>
                                <td><?php echo $m['username'] ?></td>
                                <td><?php echo $m['email'] ?></td>
                                <td><?php echo $m['nic'] ?></td>
                                <td><?php echo $m['status'] ?></td>
                                <td><a href="approve.php?id=<?php echo $m['id']; ?>">Approve</a></td>
                                <td><a href="Notapprove.php?id=<?php echo $m['id']; ?>">NotApprove</a></td>
                            </tr>
                            <?php endwhile; ?>



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