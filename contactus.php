<?php
#creating connection
$s = "localhost";
$u = "root";
$p = "";
$db = "aca";
$con = mysqli_connect($s, $u, $p, $db);
#testing connection
if(!$con)
{
  die("<h1 style='color: red; font-family: emailncy fb; font-weight: bold'>Connection denied"."</h1>".mysqli_error($con));
}
#Receiving form data
$names = $_POST['names'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "insert into contatus(names, email, message) values ('$names', '$email', '$message')";
if (mysqli_query($con, $sql)) 
{?>
<?php
  echo("<center><h1 style='color: darkslategray; font-family: emailncy fb; font-weight: bold'>Message received!!<br></h1>".mysqli_error($con));
  #echo("<h1 style='color: darkslategray;font-family: emailncy fb; font-weight: bold'>Go back.</center>".mysqli_error($con)."</h1>");
  include'contactus.html';?>
<?php
}
else
{
  echo("<center><h1 style='color: red; font-family: emailncy fb; font-weight: bold'>sending failed!!<br>".mysqli_error($con)."</h1></center>");
  echo "<center><a href='register.html' style='text-decoration: none; color:gray; font-size: 30px;background-color: greenyellow;text-align: center;border: solid 4px gray; padding: 4px;'>Try again!</a></center>";
}
?>