<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;

}

body {
  font-family: Arial, Helvetica, sans-serif;
}


.column {
  float: left;
  width: 25%;
  padding: 0 10px;
  margin-top:30px;
  right: calc(50% - 50px);
  
}


.row {margin: 0 15px;}

.row:after {
  content: "";
  display: table;
  clear: both;
}


@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}


.card {
    
    
  color:black;
  padding: 16px;
  
  text-align: center;
  background-color: #f1f1f1;
}


</style>
</head>
<body>
    <div class="row">
    <?php
session_start();
if(isset($_POST['submit'])){
    include 'db_connect.php';
     $conn=OpenCon();
     

    $username = $_POST['uname'];
    $sql="select * from doctor_info where department='$username'";
    $result = mysqli_query($conn,$sql);
     if(mysqli_num_rows($result)>0){
     while ($row = mysqli_fetch_assoc($result)) {
        ?>
        
  <div class="column">
            
    <div class="card">
      <?php
      $s=$row['image'];
      echo '<img src="data:image;base64,'.base64_encode($row['image']).' " alt="photo" style="width:100%;height:auto">'; ?>
        <!--img src="male.png" alt="Person" style="width:100%"-->
      <h3><?php echo $row['Dname']; ?></h3>
      <p style="font-style: italic"><?php echo $row['speciality'].", ";
      echo $row['department']; ?></p>
      <p style="font-style: italic; font-size: 17px;"><?php echo $row['degree']; ?></p>
      <a href="#?nid=<?php echo $nid ?>">Make Schedule</a><br>
    </div>
  </div>

  <?php

            /*$mail=$row['Dname'];
         $pass=$row['department'];   
         echo $mail;
          echo $pass;*/
        }
    }else {
            
            echo "sorry";
        } 


}

?></div>
</body>
</html>