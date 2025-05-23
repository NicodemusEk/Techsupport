<!DOCTYPE html>
<?php
session_start();
$host= "localhost";
$user= "root";
$pass= "";
$db= "charlieuppgift";

$conn = mysqli_connect($host, $user, $pass, $db) or die("Connection failed: " . mysqli_connect_error());

if (isset($_POST['btnsubmit'])){
    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql= "SELECT * FROM users WHERE name='$name' AND password='$password'";
    
    if($result= mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
           // echo "Välkommen " . strtoupper($row['name']);//
            $_SESSION['name'] = $row['name']; 
            $_SESSION['admin'] = $row['admin'];
        } else {
            echo "Felaktigt användarnamn eller lösenord!";
        }
    } else {
        echo "Något gick fel med databasen.";
    };
}
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
    <h1>Login</h1>
    <?php
    if(isset($_SESSION['name'])){
        echo "Välkommen " . strtoupper($_SESSION['name']);
        ?>
        
        <a href="logout.php">Logga ut</a>
   
        <?php
    } else {
       ?>
       <form action="Login.php" method="POST">
        <input type="text" name="name" placeholder="Namn" required>
         <input type="text" name="password" placeholder="Lösernord" required>
         <input type="submit" name="btnsubmit" value="Logga in">
        
        </form>
       <?php
    }
    ?>
   

     <div class="Ärende">
        <a href="Ärende.php">Till ärende</a>
   </div>
</body>
</html>