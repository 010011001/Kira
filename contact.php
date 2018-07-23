<?php
include 'contactdb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<center><body>
<h1>Mail Option</h1>
<?php 
if ($mss != ""){ 
    echo $mss;
 }  
?>
<form action="contactdb.php" method='POST'>  
<h3>TO:
<input type="text" name="sendto"></h3>
<h3>From:
<input type="text" name="from"></h3>
<h3>subject:
<input type="text" name="subject"></h3>
<h3>Message:<br>
<textarea name="msg" cols="30" rows="10"></textarea></h3>
<button type="submit" name="submit">Send</button>
</form>  

</body></center>
</html>