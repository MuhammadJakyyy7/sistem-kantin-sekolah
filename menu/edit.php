<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id=$_POST['id_menu'];
    $jenis=$_POST['Jenis'];
    $harga=$_POST['Narga'];
    $nama=$_POST['Nama'];
    $stok=$_POST['Stok'];
    $penjual=$_POST['Penjual'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE menu SET Jenis='$jenis',Harga='$harga',Nama='$nama',Stok='$stok', Penjual='$penjual' WHERE id_menu=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id_menu'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM menu WHERE id_menu=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $id = $user_data['id_menu'];
    $jenis = $user_data['Jenis'];
    $harga = $user_data['Harga'];
    $nama = $user_data['Nama'];
    $stok = $user_data['Stok'];
    $penjual = $user_data['Penjual'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>id_menu</td>
                <td><input type="text" name="id_menu" value=<?php echo $id;?>></td>
            </tr>
            <tr> 
                <td>Jenis</td>
                <td><input type="text" name="Jenis" value=<?php echo $jenis;?>></td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="text" name="Harga" value=<?php echo $harga;?>></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="Nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Stok</td>
                <td><input type="text" name="Stok" value=<?php echo $stok;?>></td>
            </tr>
            <tr> 
                <td>Penjual</td>
                <td><select name="id_penjual"> 
                    <?php 
                    include_once("../config.php");
                    $penjual = mysqli_query($mysqli,"SELECT * FROM penjual ORDER BY id_penjual DESC");
                    while($data = mysqli_fetch_array($penjual)) {
                        echo '<option value="'.$data['id_penjual'].'">'.$data['nama'].'</option>';
                    }
                    ?>
            </select>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id_menu'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>