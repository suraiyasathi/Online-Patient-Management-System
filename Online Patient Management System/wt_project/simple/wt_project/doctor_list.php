<?php
session_start();
if(isset($_POST['submit'])){
    include 'db_connect.php';
     $conn=OpenCon();
     echo "Hello";

    $username = $_POST['uname'];
    $sql="select * from staff where email='$username'";
    $result = mysqli_query($conn,$sql);
     if(mysqli_num_rows($result)>0){
     while ($row = mysqli_fetch_assoc($result)) {

            $mail=$row['email'];
         $pass=$row['password'];   
         echo $mail;
          echo $pass;
        }
    }else {
            
            echo "sorry";
        } 


}

?>