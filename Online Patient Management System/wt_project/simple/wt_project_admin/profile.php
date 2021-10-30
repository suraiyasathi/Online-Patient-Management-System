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
    <title>Home page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="profile_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"-->
	<!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

	<style>
		ul{
			background-color: #eee;
			cursor: pointer;
			color: black;
			list-style:none;
			width: 20%;
		   }
		li:hover{
	background-color:#87cefa;
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
				
			<li><a href="index.html">Home</a></li>
			    <li><a href="appointment.php">Appointment List</a></li>
			    <li><a href="#">Patient</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact Info</a></li>

			</ul>


			</div>
		</nav>
		
		

	<div class="search-box">
			
        <form action="doctor_list.php" method = "POST">
    
      <input type="text" id="search" placeholder="Search.." name="search">     
      
      <input id="submit" type = "submit" value = "Search" >
      <div id="search_option"></div>
      <p class="form-message"></p>
    </form>
    </div>

	</header>
	<script>
	$(document).ready(function(){
		$('#search').keyup(function(){
			//event.preventDefault();
			var s = $(this).val();
			if(s != '')
			{
				$.ajax({
					url:"search.php",
					method:"POST",
					data:{s:s},
					success:function(data)
					{
						$('#search_option').fadeIn();
						$('#search_option').html(data);

					}

				});
			}else{
				$('#search_option').fadeOut();
				$('#search_option').html("");
			}
		});

		$(document).on('click','li',function(){
			$('#search').val($(this).text());
			$('#search_option').fadeOut();
		});

		$("form").submit(function(event){
			event.preventDefault();
			var uname=$("#search").val();
			var submit=$("#submit").val();
			$(".form-message").load("doctor_list.php",{
				uname:uname,				
				submit:submit
			});
		});
		});	

	
	</script>
	
</body>
</html>