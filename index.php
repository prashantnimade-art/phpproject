<?php
$insert=false;
if(isset($_POST['name'])){
    //create database connection
    $con = mysqli_connect("localhost","root","");

    //check for connection succe..
    if(!$con){
        die("connection to this database failed".mysqli_connect_error());
    }
    //echo "Success database";

    //collect post variables
    $name =  $_POST['name'];
    $age = $_POST['age'];
    $class = $_POST['class'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `class`, `email`, `phone`, `description`, `date`) VALUES ('$name', '$age', '$class', '$email', '$phone', '$desc', current_timestamp())";
    // echo $sql;

    //execute the query
    if($con->query($sql)==true){
        // echo "Suceesfully inserted";
        $insert=true;
    }else{
        echo "Error: $sql <br> $con->error";
    }

    //close the connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
        <body>
            <img class="bg" src="1.jpg" alt="Black Window">
            <div class="container">
                <h1>Welcome to Tour's Visit Froms</h1>
                <p>Enetr your Details in this forms</p>
                <?php
                if($insert == true){
                echo "<p class='submitmsg'>Thanks for Submmiting your form</p>";
                }
                ?>
                <form action="index.php" method="post">
                    <input type="text" name="name" id="name" placeholder="Enetr your name">
                    <input type="text" name="age" id="age" placeholder="Enetr your age">
                    <input type="text" name="class" id="class" placeholder="Enetr your class">
                    <input type="email" name="email" id="email" placeholder="Enetr your email">
                    <input type="number" name="phone" id="phone" placeholder="Enter your phone">
                    <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Describe yourself"></textarea>
                    <button class="btn">Submit</button>
                    <!-- <button class="btn">Reset</button> -->
                </form>
            </div>
            <script src="index.js"></script>
        </body>
</html>

