s<?php
session_start();
include('configure.php');
include('global.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM contacts WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $title = $_POST['title'];
        $created = $_POST['created'];

        $result = $conn->query($sql);
        errorCheck($sql, $conn, $result);

        $sql_update = "UPDATE contacts SET name='$name', email='$email', phone='$phone', title='$title' , created='$created' WHERE id='$id'";
        $result_update = $conn->query($sql_update);

        if ($result == TRUE) {
            $_SESSION['message'] = $name . "info updated successfully.";
            header("Location: read.php");
            exit();
        }
    }
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
         
            <h2>Update Contact #<?= $row['id']?></h2>
          
                <form action="" method="post">
                <div class="create-contact">
                <div>
                    <p>ID</p>
                    <input type="text" name="id" value="<?= $row['id'] ?>" disabled placeholder="auto">        
                </div>
                <div>
                    <p>NAME</p>
                    <input type="text" name="name" value="<?= $row['name'] ?>">    
                </div>
                <div>
                    <p>EMAIL</p>
                    <input type="text" name="email" value="<?= $row['email'] ?>">
                </div>
                <div>
                    <p>PHONE</p>
                    <input type="number" name="phone" value="<?= $row['phone'] ?>">
                </div>
                <div>
                    <p>TITLE</p>
                    <input type="text" name="title" value="<?= $row['title'] ?>">
                </div>
                <div>
                    <p>CREATED</p>
                    <input type="date" name="created" value="<?= $row['created'] ?>">
                    
                </div>
            </div>
            <br>
            <div class="btn-createContact">
                
                <button>Update Contact</button>
                
                </br>
            </div>
                </form>
           
        </div>
    </div>

</body>

</html>