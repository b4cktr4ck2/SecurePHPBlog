<?php
session_start();
$_SESSION['old_page'] = 'manage-posts.php';
include('requires/header.php');
//If code below is executing then user can see page, i.e. successful login.
//Make sure to clear the redirect var.
$_SESSION['old_page'] = ''; 
?>

<a href="new-post.php">Create a new post!</a>
<br>
<a href="edit-posts.php">Edit or delete previous posts.</a>

<?php
include('requires/footer.php');
?>