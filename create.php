<?php
session_start();
include('configure.php');
include('global.php');

$message = isset($_SESSION['message']) ? $_SESSION['message'] : "";

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $title = $_POST['title'];
    $created = $_POST['created'];
    $sql = "INSERT INTO `contacts`(`name`, `email`, `phone`, `title`, `created`) VALUES ('$name', '$email','$phone', '$title', '$created')";
    $result = $conn->query($sql);

	if($result == TRUE){
	echo "New record created successfully!!!";
	}
	else{
	echo "ERROR!!!".$sql."<br>". $conn->error;
	}
	$conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>lab9_10</title>
</head>

<body>
    <div class="navbar">
        <center>
        <h1>LAB ACTIVITY</h1>
        </center>
        <div class="nav-right-side">
            <a style="text-decoration: none;" href="read.php">
            
                <button><img src="1.png" alt="">HOME</button>
            </a>
            <button><img src="2.png" alt="">CONTACT</button>
            
        </div>
    </div>
    <div class="main">
        <div class="main-container">
            <form action="" method="post">
                
                <h2>Create Contact</h2>
                
                <div class="create-contact">
                    <div>
                        
                        <p>ID:</p>
                        <input type="text" disabled placeholder="auto">
                    </div>
                    <div>
                        <p>NAME:</p>
                        <input type="text" name="name" required>
                    </div>
                    <div>
                        <p>EMAIL:</p>
                        <input type="email" name="email" required>
                    </div>
                    <div>
                        <p>PHONE:</p>
                        <input type="number" name="phone" required>        
                    </div>
                    <div>            
                        <p>TITLE:</p>
                        <input type="text" name="title" required>       
                    </div>
                    <div>  
                        <p>CREATED:</p>
                        <input type="date" name="created" required>
                        
                    </div>
                </div>
                <br>
                <div class="btn-createContact"> 
                    <button>Create Contact</button>
                   </br>
                </div>
            </form>
        </div>
    </div>
</body>

</html>