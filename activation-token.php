<?php
session_start();
include ('requires/header.php');
if($LS->getUser("role") !== "admin"){
    //User is logged in, but isn't an admin. Send them home.
    //Sending them to login.php led to a redirect loop
    header('Location: index.php');
    die("YOU ARE NOT ADMIN LEAVE THIS PLACE MORTAL");
}
else{
$username= $_POST['username'];
$token = $LS->rand_string(25);
}
?>
<?php		
include ('requires/database-preamble.php');
pg_prepare($db, "query1","UPDATE users SET activation_token = $1 WHERE username = $2");
pg_execute($db, "query1", array($token, $username));
error_log($username.": 192.168.199.151/Assignment 2/activate.php?token=".$token);
?>


<?php
pg_close($db);
include ('requires/footer.php');
header("Location: administrate.php");
die("Goin' back to the future");
?>