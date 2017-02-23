<?php
session_start();
include('requires/header.php');
if(!isset($_GET["username"])){
    header("Location: view-users.php");
    die();
}
$username = $_GET["username"];
?>

<h1>LIST OF DETAILS:</h1>	
<table>		
<thead>			
<tr>				
<td>Username</td>				
<td>Post:</td>				
<td>Created on:</td>		
</tr>		
</thead>	
<tbody>		

<?php	
include ('requires/database-preamble.php');
$res = pg_query_params($db, 'SELECT username, body, created FROM posts where username = $1 ORDER BY id DESC',[$username]);	
while($line = pg_fetch_row($res)){ ?>	
<tr>		
<?php foreach($line as $cell){ ?>	
<td>	
<?php print_r($cell);?> 
</td>			
<?php
}	
?> 	
</tr>	
<?php		
}	
?>	
</tbody>	
</table>
<?php
include ('requires/footer.php');
?>
