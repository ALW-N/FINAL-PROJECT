<?php
  session_start();
  if(!isset($_SESSION['userdata'])){
      header("location: ../");
}
$userdata = $_SESSION['userdata'];
$candidatedata = $_SESSION['candidatedata'];

if($_SESSION['userdata']['status']==0){
    $status = '<b style="color:red">NOT VOTED</b>';
}
else {
    $status = '<b style="color:green">VOTED</b>';
}

?>

<html>

<head>
<title>Online Voting System - Dashboard</title>
<link rel="stylesheet" href="../css/stylesheet.css">

</head>
<body>
    <style>
#logout{
    padding: 10px;
    border-radius: 5px;
    background-color: blueviolet;
    color: white;
    border-radius: 5px;
    float: right;
}
#back{
    padding: 10px;
    border-radius: 5px;
    background-color: blueviolet;
    color: white;
    border-radius: 5px;
    float: left;
}

#profile{
  background-color: white;
  width: 30%;
  padding: 20px;
  float: left;

}
#cand{
background-color: white;
width: 60%;
padding: 20px;
float:right;
}

#votebtn{
    padding: 10px;
    border-radius: 5px;
    background-color: blueviolet;
    color: white;
    border-radius: 5px;


}

#main{
    padding: 10px;
}

#voted{
    padding: 10px;
    border-radius: 5px;
    background-color: green;
    color: white;
    border-radius: 5px;
}


    </style>

<center>
<div id="mainsection">
<div id="headerSection">
<a href="logout.php"> <button id="logout">LOGOUT</button><br></a>
    <h1>Admin - Dashboard</h1>

</div>
</div>

</center>
<div id="main">
<div id="Profile">
        <center><img src="../uploads/<?php echo $userdata['photo']?>"  height="100" width="100"><br><br></center>
        <b>Name:</b> <?php echo $userdata['name']?> <br><br>
        <b>Mobile:</b> <?php echo $userdata['mobile']?><br><br>
        <b>Address:</b> <?php echo $userdata['address']?><br><br>
    </div>

    <div id="cand">
         <?php
            if($_SESSION['candidatedata']){
                for($i=0; $i<count($candidatedata); $i++){
                   ?>
              <div>
                  <img style="float: right" src="../uploads/<?php echo $candidatedata[$i]['photo'] ?>" height="100" width="100"> <br><br>
                  <b>Candidate Name:</b> <?php  echo $candidatedata[$i]['name']?><br><br>
                  <b>Votes: </b><?php echo $candidatedata[$i]['votes']?> <br><br>
                  <form action="../api/vote.php" method="POST">
                        <input type="hidden" name="cvotes" value="<?php echo $candidatedata[$i]['votes']?>">
                        <input type="hidden" name="cid" value="<?php echo $candidatedata[$i]['id']?>">
                     </form>
                </div>
                <?php
            }
        }
        else{

        }

     ?>
    </div>

</div>


</body>
</html>