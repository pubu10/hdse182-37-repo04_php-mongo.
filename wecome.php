
<html>
    <head>
        <title>
            login-Done
        </title>
        
    </head>
    <body
    
       <?php
    session_start();

    if (!isset($_SESSION['luser'])) {
        echo "Please Login again";
        header("Location:Redirect.php"); 
    }
    else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
           header("Location:wecome.php"); 
        }
        else { //Starting this else one [else1]
?>
            <!-- From here all HTML coding can be done -->
            <html>
                Welcome
                <?php
                    echo $_SESSION['luser'];
                    echo "<a href='logout.php'>Log out</a>";
                ?>
            </html>
<?php
        }
    }
?>
    </body>
</html>

