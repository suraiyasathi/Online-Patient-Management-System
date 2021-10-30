<!--?php
session_start();
include 'db_connect.php';
$conn=OpenCon();
$mail=$_SESSION['email'];
$sql="select email from staff where email='$mail'";
$result = mysqli_query($conn,$sql);
     if(mysqli_num_rows($result)>0){
     while ($row = mysqli_fetch_assoc($result)) {
		 $name=$row['email'];
	 }
	 }
?-->
<!DOCTYPE html>
<html>
<head>
    <title>Appointment page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="profile.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<style>
	/*table {
  width: 80%;
  border-collapse: collapse;
  color: black;
  
}

table, td, th {
  border-collapse: collapse;
  padding: 5px;
}*/
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 90%;
  color: black;
}

td, th {
  text-align: center;
  padding:18px;
}
#t01 th {
  background-color: #4da6ff;
  color: black;
}
th {text-align: center;}
tr:nth-child(even) {
  background-color: #dddddd;
}
tr:nth-child(odd) {
  background-color: #e0ebeb;
}
	
</style>
</head>
<body>
	
	<div class="tablestyle">
	
    <table id="t01" align="corner" style="text-align: center">
	<thead>
	<tr>
		<th>Serial</th>
		<th>Patient Name</th>
		<th>NID</th>
		<th>Doctor's Name</th>
		<th>Date</th>
		<th>Time</th>
		<th>Status</th>
	</tr>
	</thead>
	<tbody>
	<?php
	session_start();
include 'db_connect.php';
$conn=OpenCon();

	$dept=$_POST['dept'];
	$name=$_POST['name'];
	$serial=1;

$sql1 = "select * from appointment_list where Dname='$name' and department='$dept'";
$result1 = mysqli_query($conn,$sql1);
     if(mysqli_num_rows($result1)>0){
     while ($row1= mysqli_fetch_assoc($result1)) {
		 //$serial=$row1['serial'];
     	 $nid=$row1['NID'];
		 $pname=$row1['Pname'];
		 $date=$row1['day'];
		 $dname=$row1['Dname'];
		 $time=$row1['shift'];
		 echo "<tr><td>".$serial."</td><td>".$pname."</td><td>";
	 echo $nid."</td><td>".$dname."</td><td>".$date."</td><td>".$time."</td><td>";
	 
?><br>
<a href="cancel.php?nid=<?php echo $nid ?>" onclick="return confirm('Are you sure?')">Cancel Appointment</a>
<?php echo "</td></tr>";
$serial++;
		 }
		 }?>
</tbody>
	 </table>
</div>
</body>
</html>