<?php
include ("connection.php");
$id=$_GET["id"];
$a=date("d-m-Y");
echo $id;

if ($m=mysqli_query($connection,"UPDATE `issue` set `return_date`='$a' where `id`='$id';")){ ?>
    <script type="text/javascript">
        alert("Return Succefully");
        window.location="return_book.php";
    </script>
<?php }
?>


