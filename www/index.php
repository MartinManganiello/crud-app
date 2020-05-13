<?php
require 'db_connection.php';
// function for getting data from database
function get_all_data($conn){
    $get_data = mysqli_query($conn,"SELECT * FROM `users`");
    if(!empty($get_data) AND mysqli_num_rows($get_data) > 0){
        echo '<table>
              <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
              </tr>';
        while($row = mysqli_fetch_assoc($get_data)){
            echo '<tr>
            <td>'.$row['username'].'</td>
            <td>'.$row['user_email'].'</td>
            <td>
            <a href="update.php?id='.$row['id'].'">Edit</a>&nbsp;|
            <a href="delete.php?id='.$row['id'].'">Delete</a>
            </td>
            </tr>';

        }
        echo '</table>';
    }else{
        echo "<h3>No records found. Please insert some records</h3>";
    }
}
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
       <!-- INSERT DATA -->
        <div class="form">
            <h2>Insert Data</h2>
            <form action="insert.php" method="post">
                <strong>Username</strong><br>
                <input type="text" name="username" placeholder="Enter your full name" required><br>
                <strong>Email</strong><br>
                <input type="email" name="email" placeholder="Enter your email" required><br>
                <input type="submit" value="Insert">
            </form>
        </div>
        <!-- END OF INSERT DATA SECTION -->
        <hr>
        <!-- SHOW DATA -->
        <h2>Show Data</h2>
        <?php
        // calling get_all_data function
        get_all_data($conn);
        ?>
        <!-- END OF SHOW DATA SECTION -->
    </div>
</body>

</html>