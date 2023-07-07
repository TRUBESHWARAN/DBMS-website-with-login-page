<?php
include 'dbconn.php';
session_start();
if(isset($_SESSION['username']))      
{
$name = "";
$email = "";
$phone = "";
$address = "";
$password = "";

$errorMessage = "";
$successMessage = "";
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"]; 
    $password = $_POST["password"];

    do {
        if ( empty($name) || empty($email) || empty($phone) || empty($address) || empty($password)){
            $errorMessage = "All the fields are required";
            break;
        }

        // add neew client to db

        $sql = "INSERT INTO clients (name,email,phone,address,password)" . "values('$name', '$email','$phone','$address','$password')";
        $result = $con->query($sql);

        if(!$result)
        {
            $errorMessage = "Invalid query: " . $con->error;
            break;
        }

        $name = "";
        $email = "";
        $phone = "";
        $address = "";
        $password = "";

        $successMessage = "Client added successfully";

        header("Location:index.php");
        exit();

    }while (false);
}
}
else{
    echo "<script>alert('unauthorized user');window.location='login.php' </script>";
    
}

?>
<html>
    <head>
        <title>My Shop</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container my-5">
            <div class="head">
                <h2>New Client</h2>
            </div>

            <?php
            if (!empty($errorMessage) ) {
                echo"
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
            ?>


            <form method="post">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                    </div>
                </div>    
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
                    </div>
                </div>  
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
                    </div>
                </div> 
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="password" value="<?php echo $password;?>">
                    </div>
                </div> 

                <?php
                if (!empty($successMessage) ){
                    echo"
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-3 d-grid'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                    ";
                }
                ?>

                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-primary" style="background-color: #176f9b;">Submit</button>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="/myshop/index.php" role="button" style="background-color: #ff2b2b;;
    color: white;">Cancel</a>
                    </div>
                </div> 
            </form>
        </div>
    </body>
</html>