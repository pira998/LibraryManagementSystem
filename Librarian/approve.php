<?php include ("connection.php");
?>

<?php
$id=$_GET["id"];
$sql="UPDATE `student_info` SET `status`='Yes' WHERE (`id`=$id);";

mysqli_query($connection,$sql);



?>
<script type="text/javascript">
    window.location=("index.php")
</script>
