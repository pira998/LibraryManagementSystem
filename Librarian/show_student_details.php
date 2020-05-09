<?php
include ("connection.php");

?>

<?php

$sql="SELECT * FROM `student_info`";
$array=mysqli_query($connection,$sql);

$id=$firstname=$lastname=$username=$email=$nic=$status='';
?>
<table class="table table-bordered" id="myTable">
    <tr>
        <th>Id</th>
        <th>Regis_Num</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Grade</th>
        <th>Address</th>
        <th>Email</th>
        <th>NIC</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Approve</th>
        <th>Not Approve</th>
    </tr>
    <tr>
    <?php while ($m=mysqli_fetch_array($array)):?>
        <td><?php echo $m['id'] ?></td>
        <td><?php echo $m['regis_num']?></td>
        <td><?php echo $m['firstname'] ?></td>
        <td><?php echo $m['lastname'] ?></td>
        <td id="username"><?php echo $m['username'] ?></td>
        <td><?php echo $m['grade'] ?></td>
        <td><?php echo $m['Address']?></td>
        <td><?php echo $m['email'] ?></td>
        <td id="nic"><?php echo $m['nic'] ?></td>
        <td><?php echo $m['status'] ?></td>
        <td><a href="Edit_Student.php?id=<?php echo $m['id']?>">Edit</a></td>
        <td><a href="approve.php?id=<?php echo $m['id']; ?>">Approve</a></td>
        <td><a href="notApprove.php?id=<?php echo $m['id']; ?>">NotApprove</a></td>
    </tr>
    <?php endwhile; ?>



</table>
