<!DOCTYPE html>
<html>
<head>
    <title>Appointment page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="index_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<style type="text/css">
	table {
  width: 80%;
  border-collapse: collapse;
  color: black;
  
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
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
    <header>
	    <nav>
		    <div class="home clearfix animated slideInDown">
			<ul class="main-nav animated slideInDown">
			    <li><a href="index.html">Home</a></li>
			    <li><a href="appointment.php">Appointment List</a></li>
				<li><a href="#">Make Schedule</a></li>
				<li><a href="#">Contact Info</a></li>
			</ul>
		</nav>
		
	</header>
	<div class="tablestyle">
	
    <table align="corner" style="text-align: center">
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
include 'db_connect.php';
$conn=OpenCon();
$sql = "SELECT * FROM appointment";
$result = mysqli_query($conn,$sql);
     if(mysqli_num_rows($result)>0){
     while ($row= mysqli_fetch_assoc($result)) {
		 $serial=$row['serial'];
		 $nid=$row['NID'];
		 $pname=$row['PName'];
		 $date=$row['date'];
		 $dname=$row['DName'];
		 $time=$row['time'];
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