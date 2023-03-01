<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title> LIST OF USERS</title>
    <style>
        .btn
{
    margin:auto;
    font-size:15px;
    border:1px solid;
    border-radius:14px;
    justify-content:center;
}</style>
    
</head>
<body style="margin:50px;" bgcolor="#E7D5A5">

    <h1>LIST OF USERS</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>PASSWORD</th>
</tr>
</thead>
<tbody><?php
error_reporting(E_ERROR | E_PARSE);
$servername="localhost";
$username="root";
$password="";
$database="trip";
$connection=new mysqli($servername,$username,$password,$database);
if($connection->connect_error)
{
    die("connection failed:".$connection->connect_error);
}
$delun=$_POST["delun"];
$delete1="DELETE FROM `trip` WHERE `username`='$delun';";
$deleteres1=$connection->query($delete1);
$sql="SELECT username,email,pswd  FROM trip ";
$result=$connection->query($sql);
if(!$result)
{
    die("Invalid query:".$connection->error);
}
 //$date=$_POST['date'];
 
while($row=$result->fetch_assoc()){
    
    echo "<tr>
    <td>" .$row["username"]. "</td>
    <td>" .$row["email"]. "</td>
    <td>".$row["pswd"]. "</td></tr>";
}

    
?>
</tbody>
</table>
<form action="user.php" method="post">
    <br><p><b>Enter Username to delete the user<b></p><br>
<table><tr><td>
    <p>Enter Username:&nbsp;&nbsp;&nbsp;&nbsp;</p></td>
    <td><input type="text" name="delun"><br></td></tr>
    <tr><td></td><td><button class="btn">delete user</button></td></tr>

</table>


</body>
</html>