<?php
include 'dbconn.php';
session_destroy();
session_start();

$_SESSION['error'] = null;


if(isset($_POST['username'],$_POST['password']))
{
    function validate($data){

        $data = trim($data);
 
        $data = stripslashes($data);
 
        $data = htmlspecialchars($data);
 
        return $data;
 
    }
 
    $username = validate($_POST['username']);
 
    $password = validate($_POST['password']);

    if (empty($username)){
       header("Location: login.php?empty= username is required");
        exit();
    }
    elseif (empty($password)){
       header("Location: login.php?empty= password is required");
        exit();
    }
    else{
        $sql = "SELECT * FROM clients WHERE name = '".$username."' AND password = '".$password."'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)){    
            $row = mysqli_fetch_array($result);
            if($row['name']===$username && $row['password']===$password){
                $_SESSION['username'] = $row['name'];
                header("Location:index.php");
                exit();
           }
           else{
            header("Location:login.php");
            exit();
           }
        }else{
            $_SESSION['error'] = "Invalid username or password";
            header("Location:login.php");
            exit();
        }    
    }
}
else{
    header("Location:login.php");
    exit();
}
?>