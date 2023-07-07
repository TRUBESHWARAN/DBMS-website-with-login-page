<html>
    <head>
        <title>My Shop</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class= "container my-5">
            <div class="head">
                <h5>List Of Clients</h5>
            </div>
            <div class="userbtn">
                <div class="left">
                    <a class= "btn btn-primary" href="create.php" role="button">New Client</a>
                </div>
                <div class="right">
                    <a class= "btn btn-primary" href="logout.php" role="button">LogOut</a>
                </div>
            </div>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    session_start();
                    if(isset($_SESSION['username']))     
                    {
                        include 'dbconn.php';
                        $sql = "SELECT * FROM clients";
                        $result = $con->query($sql);
                        
                        if(!$result){
                            die("Invalid query: " . $con->error);
                        }

                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>$row[id]</td>
                                <td>$row[name]</td>
                                <td>$row[email]</td>
                                <td>$row[phone]</td>
                                <td>$row[address]</td>
                                <td>$row[created_at]</td>
                                <td>
                                    <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Edit</a>
                                    <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
                                </td>
                            </tr>
                            ";
                        }
            
                    }
                    else{
                        header("Location:login.php");
                    }
                   ?>                    
                </tbody>
            </table>
        </div>
    </body>
</html>