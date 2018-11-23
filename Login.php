<?php
session_start();
if(isset($_POST['Submit']))
{
$username = $_POST['username'];
$password = $_POST['password'];

  try {
        // open connection to MongoDB server
        $conn = new Mongo('localhost');

        // access database
        $db = $conn->Login;

        // access collection
        $collection = $db->users;

        $user = $db->$collection->findOne(array('username'=> 'user1', 'password'=> 'pass1'));

        foreach ($user as $obj) {
            echo 'Username' . $obj['username'];
            echo 'password: ' . $obj['password'];
            if($userName == 'user1' && $userPass == 'pass1'){
                            ;
                 $_SESSION['luser'] = $username;
            $_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
      header("Location:wecome.php"); 
            }
            else{
                       
                 header('Location:index.php');
            }

        }

        // disconnect from server
        $conn->close();

    } catch (MongoConnectionException $e) {
        die('Error connecting to MongoDB server');
    } catch (MongoException $e) {
        die('Error: ' . $e->getMessage());
    }

$_SESSION["loggedInUser"] = $correct;
}
?>
