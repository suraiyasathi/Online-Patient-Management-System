<?php
session_start();
     include 'db_connect.php';
     $conn=OpenCon();
     //echo "Hello";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql="select * from staff where email='$username' and password='$password'";

    $flag = true;
    $messages = array();

    
    if ( $username == '' && $password == '' ) {
        $flag = false;
        $messages[] = 'Please Enter the Email ID & Password.';
    }

    else if ( $username == '' ) {
        $flag = false;
        $messages[] = 'Please Enter the Email ID.';
    }

    else if ( $password == '' ) {
        $flag = false;
        $messages[] = 'Please Enter the Password.';
    }

    else if ($flag) {
    	$result = mysqli_query($conn,$sql);
     if(mysqli_num_rows($result)>0){
     while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['email'] = $username;
            $flag = true;            
        }
    }else {
            $flag = false;
            $messages[] = 'Invalid login attempt.'; 
        }
    }



    echo json_encode(
        array(
            'flag' => $flag,
            'messages' => $messages
        )
    );

?>