<?php
session_start();
include 'db_connect.php';
$conn=OpenCon();
$sql = "SELECT * FROM appointment_list";
$Nid = $_GET['nid'];
$flag=0;
$result = mysqli_query($conn,$sql);
     if(mysqli_num_rows($result)>0){
     while ($row= mysqli_fetch_assoc($result)) {
		 $serial=$row['serial'];
		 $nid=$row['NID'];
		 
		 /*if($flag==1)
		 {
			 $sql2="UPDATE appointment_list SET serial=$serial-1 where NID=$nid";
			 if ($conn->query($sql2) === TRUE) {
                
				}
		 }*/
		 if($Nid==$nid)
		 {
			 $sql1="DELETE FROM appointment_list where NID=$Nid";
			 if ($conn->query($sql1) === TRUE) {
                //$flag=1;
				}
		 }
		 
	 }
	 }header('location:list.php');
	 ?>