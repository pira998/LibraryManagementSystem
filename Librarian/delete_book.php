<?php include ("connection.php");
?>

<?php
$id=$_GET["id"];
$sql="DELETE FROM `books_details`  WHERE (`id`=$id);";

mysqli_query($connection,$sql);



?>
<script type="text/javascript">
    window.location=("display_books.php")
</script>