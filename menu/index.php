<?php
// Create database connection using config file
include_once("config.php");
 

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT id_menu, menu.Nama, Jenis, Harga, Stok, penjual.Nama AS Penjual  FROM menu
inner join penjual on penjual.id_penjual=menu.id_penjual
ORDER BY id_menu DESC");
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="add.php">Add New Menu</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
        <th>id_menu</th> 
        <th>Jenis</th>
        <th>Harga</th>
        <th>Nama</th>
        <th>Stok</th>
        <th>Nama</th>
        <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id_menu']."</td>";
        echo "<td>".$user_data['Jenis']."</td>";
        echo "<td>".$user_data['Harga']."</td>";
        echo "<td>".$user_data['Nama']."</td>";
        echo "<td>".$user_data['Stok']."</td>";
        echo "<td>".$user_data['Penjual']."</td>";
        echo "<td><a href='edit.php?id_menu=$user_data[id_menu]'>Edit</a> | <a href='delete.php?id_menu=$user_data[id_menu]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>