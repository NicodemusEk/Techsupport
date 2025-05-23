<!DOCTYPE html>
<?php
session_start();
$host= "localhost";
$user= "root";
$pass= "";
$db= "charlieuppgift";

$conn = mysqli_connect($host, $user, $pass, $db) or die("Connection failed: " . mysqli_connect_error());

if(isset($_POST['btnsubmit'])){
    $name = $_POST['name'];
    $handling = $_POST['handling'];

    $sql= "INSERT INTO ticket(`name`, `handling`) VALUES ('$name','$handling')";
    $result= mysqli_query($conn, $sql);
}

$sql= "SELECT * FROM ticket";
$result= mysqli_query($conn, $sql);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="något.css">
</head>

<body>
<div class="Hela_tabell">
        <div class="head">
            <div class="logo"><img src="Logga.png" alt=""></div>
            <a href="Login.php">Logg in</a> 
            <div class="Techsuport">
<h1>Ärende</h1>
    <form action="Ärende.php" method="POST">
        <input type="text" name="name" placeholder="Namn" required>
        <input type="text" name="handling" placeholder="Handling" required>

        <input type="submit" name="btnsubmit" value="Skapa ärende">
    </form>
    <?php 
    if(isset($_SESSION['admin'])){
        if($_SESSION['admin'] == 1){
              while($rad = mysqli_fetch_assoc($result)){?>
        <p class="handlinggrejer"><?= $rad['name']?><br>(handling: <?= $rad['handling']?> <br>tid: <?=$rad['tid']?>)<br></p>
   
   <?php 

   
            }  
        }
    }
    
    ?>
    
    
    </div>
</body>
</html>