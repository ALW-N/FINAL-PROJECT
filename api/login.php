<?php
session_start();
include("connect.php");

$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role = $_POST['role'];

$check = mysqli_query($connect, "SELECT * FROM user WHERE mobile='$mobile' AND password = '$password' AND role = '$role' ");

if(mysqli_num_rows($check)>0){
    $userdata = mysqli_fetch_array($check);
    $candidate = mysqli_query($connect, "SELECT * FROM user WHERE role =2");
    $candidatedata = mysqli_fetch_all($candidate, MYSQLI_ASSOC);

    $_SESSION['userdata'] = $userdata;
    $_SESSION['candidatedata']= $candidatedata;

    echo '
    <script>
          window.location = "../routes/dashboard.php";
    </script>
';


}
else{
    echo '
           <script>
                alert("Invalid credentials");
                 window.location = "../";
            </script>
    ';
}

?>