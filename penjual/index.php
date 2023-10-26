<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM penjual ORDER BY id_penjual DESC");
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="add.php">Add New User</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
        <th>id_penjual</th> 
        <th>Nama</th>

        <th>No_Telp</th>
        <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id_penjual']."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['no_telp']."</td>";    
        echo "<td><a href='edit.php?id_penjual=$user_data[id_penjual]'>Edit</a> | <a href='delete.php?id_penjual=$user_data[id_penjual]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>