<html>
    <head>
        <title>
            My Shop
        </title>
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    </head>
    <body>
            <div class="box">
                <span class="borderline"></span>
                <form method="POST" action="logincheck.php">          
                    <h2>Login</h2>
                    <?php
                        session_start();
                        if(isset($_SESSION['error']))
                        {
                    ?>

                        <div class="alert">
                            <?php echo $_SESSION['error']?>
                        </div>

                    <?php
                        }   
                        
                    ?>
                        
                    <div class="inputbox">
                        <input type="text" name="username" required="required">
                        <span>Username</span>
                        <i></i>
                    </div>
                    <div class="inputbox">
                        <input type="password" name="password" required="required">
                        <span>password</span>
                        <i></i>
                    </div>
                    <input type="submit" name="submit" value="Login">
                </form>
            </div>
    </body>
</html>

