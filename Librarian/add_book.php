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


                        <form action="" method="post" class="col-lg-9" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="ISBN" name="ISBN"
                                            required=""></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="Title" name="title"
                                            required=""></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="Subject" name="subject"
                                            required=""></td>
                                </tr>
                                <tr>
                                    Book Image
                                    <td> <input type="file" id="bb" name="bb" required=""></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="Publisher" required=""
                                            name="publisher"></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="Language" required=""
                                            name="language"></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="Price" required=""
                                            name="price"></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="Author name" required=""
                                            name="authorname"></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="No of Pages" required=""
                                            name="numOfPages"></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="Purchase date" required=""
                                            name="purchaseDate"></td>
                                </tr>
                                <tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="Publication Date"
                                            required="" name="publicationDate"></td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" placeholder="Book qty" required=""
                                            name="bookQty"></td>
                                </tr>
                                <td> <input type="text" class="form-control" placeholder="Available Qty" required=""
                                        name="availableQty"></td>
                                </tr>
                                </tr>
                                <td> <input type="submit" name="submit1" class="btn btn-default submit"
                                        value="Insert Book" style="background-color: #007bff; color: white"></td>
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
    $tm=md5(time());
    $fnm=$_FILES['bb']['name'];
    $dst="./book_images/".$tm.$fnm;
    $dst1="book_images/".$tm.$fnm;
    move_uploaded_file($_FILES["bb"]["tmp_name"],$dst);




    $sql="INSERT INTO `books_details` VALUES ('','$_POST[ISBN]','$_POST[title]','$_POST[subject]','$dst1' ,'$_POST[publisher]','$_POST[language]','$_POST[price]','$_POST[authorname]','$_POST[numOfPages]','$_POST[purchaseDate]','$_POST[publicationDate]','$_POST[bookQty]','$_POST[availableQty]','$_SESSION[librarian]');";
    $m=mysqli_query($connection,$sql);?>
<script type="text/javascript">
alert("Added Succesfully");
</script>

<?php

}
?>