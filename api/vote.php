<?php

session_start();
include('connect.php');

$votes = $_POST['cvotes'];
$total_votes = $votes+1;
$cid = $_POST['cid'];
$uid = $_SESSION['userdata']['id'];

$update_votes = mysqli_query($connect, "UPDATE user SET votes='$total_votes' WHERE id='$cid' ");
$update_user_status = mysqli_query($connect, "UPDATE user SET status=1 WHERE id='$uid' ");

if($update_votes and $update_user_status){
    $candidate = mysqli_query($connect, "SELECT * FROM user WHERE role =2");
    $candidatedata = mysqli_fetch_all($candidate, MYSQLI_ASSOC);
    $_SESSION['userdata']['status'] = 1;
    $_SESSION['candidatedata']= $candidatedata;
    echo '
    <script>
         alert("voting successful!");
          window.location = "../routes/dashboard.php";
     </script>
';
}
else{
    echo '
    <script>
         alert("Some Error Occured!");
          window.location = "../routes/dashboard.php";
     </script>
';
}


?>