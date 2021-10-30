<?php
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
?>
<!DOCTYPE html>
<html>
<head>
    <title>Appointment page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="profile_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<style type="text/css">
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
  text-align: left;
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
	<h1>
	<?php echo "$name"."\t"."/"; ?>
	<li><a href="adminlogout.php">Logout</a></li>	
	</h1>
    <header>
	    <nav>
		    <div class="home clearfix animated slideInDown">
			<ul class="main-nav animated slideInDown">
			    <li><a href="profile.php">Profile</a></li>
			    <li><a href="appointment.php">Appointment List</a></li>
				<li><a href="#">Make Schedule</a></li>
				<li><a href="#">Contact Info</a></li>
			</ul>
		</nav>
		
	</header>
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
//include 'db_connect.php';
//$conn=OpenCon();
$sql1 = "SELECT * FROM appointment";
$result1 = mysqli_query($conn,$sql1);
     if(mysqli_num_rows($result1)>0){
     while ($row1= mysqli_fetch_assoc($result1)) {
		 $serial=$row1['serial'];
		 $nid=$row1['NID'];
		 $pname=$row1['PName'];
		 $date=$row1['date'];
		 $dname=$row1['DName'];
		 $time=$row1['time'];
		 echo "<tr><td>".$serial."</td><td>".$pname."</td><td>";
	 echo $nid."</td><td>".$dname."</td><td>".$date."</td><td>".$time."</td><td>";
	 
?><br>
<a href="cancel.php?nid=<?php echo $nid ?>">Cancel Appointment</a>
<?php echo "</td></tr>";
		 }
		 }?>
</tbody>
	 </table>
</div>
</body>
</html>