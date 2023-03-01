<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$server="localhost";
$username="root";
$password="";
$database="trip";
$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn)
{
    die("ERROR:".mysqli_connect_error());
}
function validate($data)
{$data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

$email=validate($_POST['email']);
$pswd=validate($_POST['pswd']);
if(empty($email))
{echo "Username is required";
    header("Location:adminlogin.php?error=username is required");
}
else if(empty($pswd))
{//echo "password is required";
    header("Location:adminlogin.php?error=password is required");
}
else{
$sql="SELECT  * from `admin` WHERE email='$email' && pswd='$pswd';";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num==1)
{
    //$_SESSION['uname']=$uname;
    echo "<script>window.open('admindashboard.php')</script>";

}
else{header("Location:adminlogin.php?error=invalid user or password");
    
}}}
?>
<!DOCTYPE html>
<html >
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style1.css">

</head>
<body>
    <form action="adminlogin.php" method="post">
        <h2>LOGIN</h2>
        <?php if(isset($_GET['error'])){?>
<p class="error"><?php echo $_GET['error'] ;?> </p>
       <?php  } ?>
        <label>User Name</label>
        <input type="text" name="email" placeholder="email"><br>
        <label>Password</label>
        <input type="password" name="pswd" placeholder="password"><br>
        <button type="submit">Login</button>
</form>
</body>
</html>