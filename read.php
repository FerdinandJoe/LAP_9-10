<?php
session_start();
include('configure.php');
include('global.php');

$message = isset($_SESSION['message']) ? $_SESSION['message'] : "";

$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);

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
        <h1>LAB  ACTIVITY</h1>
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
           
            <h2>Read Contacts</h2>
            
            <div class="btn-createContact">
                <a href="create.php">
                    <button>Create Contact</button>
                    <p>
                </a>
            </div>
            
            <table>
                <tr>
                    <th style="width: 50px;">ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>TITLE</th>
                    <th>CREATED</th>
                </tr>

                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td>
                                <?php echo $row['id']; ?>
                            </td>
                            <td>
                                <?php echo $row['name']; ?>
                            </td>
                            <td>
                                <?php echo $row['email']; ?>
                            </td>
                            <td>
                                <?php echo $row['phone']; ?>
                            </td>
                            <td>
                                <?php echo $row['title']; ?>
                            </td>
                            <td>
                                <?php echo $row['created']; ?>
                            </td>
                            <td class="btn">
                                <a href="update.php?id=<?= $row['id'] ?>">
                                    <button class="btn-edit"><img src="3.png" alt=""></button>
                                </a>
                                <a href="delete.php?id=<?= $row['id'] ?>">
                                    <button class="btn-delete"><img src="4.png" alt=""></button>
                                </a>
                            </td>
                        </tr>
                <?php }
                } else {
                    echo '<tr><td colspan="6">No contacts found.</td></tr>';
                }
                ?>

            </table>
        </div>
    </div>

</body>

</html>