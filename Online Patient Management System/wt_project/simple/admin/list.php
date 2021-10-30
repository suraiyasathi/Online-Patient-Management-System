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
	<link rel="stylesheet" type="text/css" href="profile.css">
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
			width: 35%;
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
				
			<li><a href="profile.php">Profile</a></li>
			    <li><a href="#">About Us</a></li>
				<li><a href="#">Contact Info</a></li>

			</ul>


			</div>
		</nav>
		<form action="appointment.php" method = "POST" style="color: black;">
		Department Name:
		<select id="dept">
		<option value="">Select Department Name</option>
        <option value="Cardiology">Cardiology</option>
        <option value="ENT">ENT</option>
        </select><br><br>
        Doctor's Name:&nbsp;&nbsp;&nbsp;
        <select id="dname">
        <option value="">Select Department first</option>
    </select>
    <input id="search" type = "submit" value="Search">
    <p class="form-message"></p>
    </form>
		

	<!--div class="search_box" style="text-align: center;">

		<form action="doctor_list.php" method = "POST">
    
      <input type="text" id="search" placeholder="Enter Department Name.." name="search" size="40">     
      
      <input id="submit" type = "submit" value = "Search" >
      <div id="search_option" style="margin-left: 33%"></div></div>
      <p class="form-message"></p>
    </form-->
    
	</header>
	<script>
	$(document).ready(function(){
		/*$('#search').keyup(function(){			
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
		});*/

		$('#dept').on('change', function(){
        var Department = $(this).val();
        
        if(Department){
            $.ajax({
                type:'POST',
                url:'appointment_list.php',
                data:{dept:Department},
                success:function(data){
                    $('#dname').html(data);
                    
                }
            }); 
        }else{
            $('#dname').html('<option value="">Select Department first</option>');
            
        }
    });
		$("form").submit(function(event){
			event.preventDefault();
			var dept=$("#dept").val();
			var name=$("#dname").val();
			var submit=$("#search").val();
			$(".form-message").load("appointment.php",{
				dept:dept,
				name:name,				
				submit:submit
			});
		});

		
		});	

	
	</script>
	
<footer>
<h5><p>Copyright © 1999-2020 W3Schools.com</p></h5>
</footer>
</body>
</html>