<?php 
include 'db_connect.php'; 
$conn=OpenCon();

if(isset($_POST["dept"])){     
    $dept=$_POST['dept'];    
    $sql = "select * from doctor_info where department='$dept'";
    $result = mysqli_query($conn,$sql); 
    echo "djasdjsadjasjd";
    echo $_POST['dept'];
     if(mysqli_num_rows($result)>0){
        echo '<option value="">Select Doctor Name</option>'; 
     while ($row = mysqli_fetch_assoc($result)) {    
            echo '<option value="'.$row['Dname'].'">'.$row['Dname'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Doctor not available</option>'; 
    } 
}
else{
    echo '<option value="">Sorry</option>'; 
}
?>