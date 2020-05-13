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
<?php include ("connection.php");
?>

<?php
$id=$_GET["id"];
$sql="SELECT * FROM `books_details`  WHERE (`id`='$id');";

$array=mysqli_query($connection,$sql);
if($k=mysqli_fetch_array($array)){
    $ISBN=$k["ISBN"];
    $title=$k["title"];
    $subject=$k["subject"];
    $bookImg=$k["bookImg"];
    $publisher=$k["publisher"];
    $language=$k["language"];
    $price=$k["price"];
    $authorname=$k["authorname"];
    $numOfPages=$k["numOfPages"];
    $purchaseDate=$k["purchaseDate"];
    $publicationDate=$k["publicationDate"];
    $bookQty=$k["bookQty"];
    $availableQty=$k["availableQty"];
}



?>
<?php
include("header.php");
include ("connection.php");

?>

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
                        <h2>Edit Book</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="" method="post" class="col-lg-9" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="ISBN" name="ISBN" required="" value="<?php echo $ISBN?>"></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="Title" name="title" required="" value="<?php echo $title?>"></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="Subject" name="subject" required="" value="<?php echo $subject?>"></td>
                                </tr>
                                <tr>
                                    Book Image
                                    <td><img height="100" width="100" src="<?php echo $bookImg?>">
                                    <input type="file"  id="bb" name="bb" ></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="Publisher" required="" name="publisher" value="<?php echo $publisher?>"></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="Language" required="" name="language" value="<?php echo $language?>"></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="Price" required="" name="price" value="<?php echo $price?>"></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="Author name" required="" name="authorname" value="<?php echo $authorname?>"></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="No of Pages" required="" name="numOfPages" value="<?php echo $numOfPages?>"></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="Purchase date" required="" name="purchaseDate" value="<?php echo $purchaseDate?>"></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="Publication Date" required="" name="publicationDate" value="<?php echo $publicationDate?>"></td>
                                </tr>
                                    <td> <input type="text" class="form-control" placeholder="Book qty" required="" name="bookQty" value="<?php echo $bookQty?>"></td>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="Available Qty" required="" name="availableQty" value="<?php echo $availableQty?>"></td>
                                </tr>
                                <tr>
                                <td> <input type="submit" name="submit1" class="btn btn-default submit" value="Update Book" style="background-color: #007bff; color: white"></td>
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
if (isset($_POST["submit1"])){
    if ($_FILES['bb']['size'] == 0) {

    }else{
        $tm=md5(time());
        $fnm=$_FILES['bb']['name'];
        $dst="./book_images/".$tm.$fnm;
        $dst1="book_images/".$tm.$fnm;
        move_uploaded_file($_FILES["bb"]["tmp_name"],$dst);
        $sql2="UPDATE `books_details` SET `bookImg`='".$dst1."' WHERE `id`='".$id."';";
        mysqli_query($connection,$sql2);
    }





    $sql="UPDATE `books_details` SET 
`ISBN`='".$_POST['ISBN']."',
`title`='".$_POST['title']."',
`subject`='".$_POST['subject']."',
`publisher`='".$_POST['publisher']."',
`language`='".$_POST['language']."',
`price`='".$_POST['price']."',
`authorname`='".$_POST['authorname']."',
`numOfPages`='".$_POST['numOfPages']."',
`purchaseDate`='".$_POST['purchaseDate']."',
`publicationDate`='".$_POST['publicationDate']."',
`bookQty`='".$_POST['bookQty']."',
`availableQty`='".$_POST['availableQty']."',
`librarianUsername`='".$_SESSION['librarian']."'
WHERE `id`='".$id."';";
    mysqli_query($connection,$sql);?>
    <script type="text/javascript">
        alert("Edited Succesfully");
        window.location="display_books.php";
    </script>

    <?php

}
?>
<?php
include("footer.php");
?>
