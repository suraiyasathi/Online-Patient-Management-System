<?php

include 'db_connect.php';
$conn=OpenCon();
$option = $_POST['s'];
if(isset($option))
{
	$output = '';
	$sql="select * from staff where email LIKE '%$option%'";
	$result = mysqli_query($conn,$sql);
	$output = '<ul class="list">';

     if(mysqli_num_rows($result)>0){
     while ($row = mysqli_fetch_assoc($result)) {
     	$output .= '<li>'.$row['email'].'</li>';
     }
 }
 else{
 	$output .= '<li>Not found</li>';
 }
 $output .= '</ul>';
 echo $output;
}
?>
