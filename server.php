<?php 

session_start();
include '../utility/connection.php';
//intializing variables

$firstname = "";
$lastname ="";
$username ="";
$email = "";
$nic = "";

$errors = array();




// Register Librarians
if(isset($_POST['submit'])){




$firstname = mysqli_real_escape_string($db,$_POST['firstname']);
$lastname = mysqli_real_escape_string($db,$_POST['lastname']);
$username =mysqli_real_escape_string($db,$_POST['username']);
$email=mysqli_real_escape_string($db,$_POST['email']);
$nic=mysqli_real_escape_string($db,$_POST['nic']);
$password_1 = mysqli_real_escape_string($db,$_POST['pass']);
$password_2 = mysqli_real_escape_string($db,$_POST['copass']);

//form validation

if( empty($firstname) ){array_push($errors, "firstname is required");}
if( empty($lastname) ){array_push($errors, "lastname is required");}
if( empty($username) ){array_push($errors, "username is required");}
if( empty($nic) ){array_push($errors, "nic is required");}
if( $password_1 != $password_2){array_push($errors, " Password do not match");}

// check database for existing user with same username

$user_check_query = "SELECT * FROM student_info WHERE username = '$username' or email = '$email' LIMIT 1";

$result = mysqli_query($db,$user_check_query);
$librarian = mysqli_fetch_assoc($result);

if($librarian){
    if($librarian['username']===$username){array_push($errors,"Username already exists");}
    if($librarian['email']===$username){array_push($errors,"This email id already has a registerd username");}

}

// Register the librarian if no error

if( count($errors)==0){

$password = $password_1;
$query = "INSERT INTO student_info (firstname,lastname,username,email,nic,password,status) VALUES('$firstname','$lastname','$username','$email','$nic','$password','No') ";

mysqli_query($db,$query);
$_SESSION['username' ]== $username;
$_SESSION['success'] == "You are now logged in";header('location: student/index.php');

}







}

    if(isset($_POST ["submit1"])){
        $count = 0;
        $res = mysqli_query($db,"select * from student_info where username='$_POST[username]' && password = '$_POST[pass]' && status='Yes'");
        $count = mysqli_num_rows($res);
        if($count==0){
?>
<div class="alert alert-danger col-lg-6 col-lg-push-3">
    <strong style="color:white">Invalid</strong> Username Or Password.
</div>
<?php
    }
    else
    { 
        $_SESSION["student"] =$_POST["username"];
?>
<script type="text/javascript">
window.location = "student/index.php"
</script>


<?php                    
    
    }
    
        
    }
?>