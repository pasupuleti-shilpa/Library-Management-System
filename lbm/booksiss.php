<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>LIST OF BOOKS ISSUED</title>
    
</head>
<body style="margin:50px;" style="background-color:pink;">
    <h1>LIST OF BOOKS ISSUED</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>SI.NO</th>
                <th>BOOK ID</th>
                <th>TITLE</th>
                <th>AUTHOR</th>
                <th>ISSUE TIME</th> 
                <th>Due Date</th>
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
$sql="SELECT * FROM book_rec ";
$result=$connection->query($sql);
if(!$result)
{
    die("Invalid query:".$connection->error);
}
 //$date=$_POST['date'];
 
while($row=$result->fetch_assoc()){
    $due=strtotime($row["date"]. ' + 15 days');
    echo "<tr>
    <td>" .$row["sino"]. "</td>
    <td>" .$row["bookid"]. "</td>
    <td>".$row["bookname"]. "</td>
    <td>" .$row["author"]. "</td>
    <td>" .$row["issuetime"]."</td>
    <td> " .date('Y-m-d',$due). " </td>
    
    
    </tr>";
}
    
?>
</tbody>
</table>
</body>
</html>
