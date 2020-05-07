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
                        <h2>Book Details</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php
                        $sql="SELECT * FROM `books_details`;";
                        $array=mysqli_query($connection,$sql);
                        ?>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Author name" id="authorname" name="authorname" onkeyup="myFunction(7,'authorname')">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Title" id="title" name="title" onkeyup="myFunction2(1,'title')">
                            </div>
                        </div>
                        <br>
                        <table id="myTable" class="table table-bordered">
                            <tr>
                                <th>ISBN</th>
                                <th>Title</th>
                                <th>Subject</th>
                                <th>BookImg</th>
                                <th>Publisher</th>
                                <th>Language</th>
                                <th>Price</th>
                                <th>Author</th>
                                <th>numOfPages</th>
                                <th>Purchase Date</th>
                                <th>Publication Date</th>
                                <th>Book Qty</th>
                                <th>Available Qty</th>
                                <th>Librarian</th>
                                <th>Delete book</th>
                                <th>Edit Book</th>
                            </tr>
                            <?php while ($m=mysqli_fetch_array($array)):?>
                            <tr>

                                    <td><?php echo $m["ISBN"]?></td>
                                    <td><?php echo $m["title"]?></td>
                                    <td><?php echo $m["subject"]?></td>
                                    <td><img src="<?php echo $m["bookImg"]?>" height="100" width="100"></td>
                                    <td><?php echo $m["publisher"]?></td>
                                    <td><?php echo $m["language"]?></td>
                                    <td><?php echo $m["price"]?></td>
                                    <td><?php echo $m["authorname"]?></td>
                                    <td><?php echo $m["numOfPages"]?></td>
                                    <td><?php echo $m["purchaseDate"]?></td>
                                    <td><?php echo $m["publicationDate"]?></td>
                                    <td><?php echo $m["bookQty"]?></td>
                                    <td><?php echo $m["availableQty"]?></td>
                                    <td><?php echo $m["librarianUsername"]?></td>
                                    <td><a href="delete_book.php?id=<?php echo $m['id']; ?>">Delete</a></td>
                                    <td><a href="edit_book.php?id=<?php echo $m['id']; ?>">Edit</a></td>
                            </tr>
                            <?php endwhile;?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<script>
    function myFunction(number,myInput) {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById(myInput);
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[number];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<script>
    function myFunction2(number,myInput) {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById(myInput);
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[number];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<?php
include("footer.php");
?>




