<?php
// include database connection file
include_once("config.php");
$query = mysqli_query($mysqli, "SELECT nama, id_penjual FROM penjual");
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id_menu'];
    $jenis=$_POST['Jenis'];
    $harga=$_POST['Harga'];
    $nama=$_POST['Nama'];
    $stok=$_POST['Stok'];
    $id_penjual = $_POST['id_penjual'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE menu SET Jenis='$jenis',Harga='$harga',Nama='$nama',Stok='$stok',id_penjual='$id_penjual' WHERE id_menu=$id");
    
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
    $id_penjual = $user_data['id_penjual'];
        
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="index.php">Kembali ke halaman utama</a>
    
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>jenis</td>
                <td>
                <select name="Jenis"> 
                <option value="Makanan" <?php echo $jenis=="Makanan"?"selected":""; ?>> Makanan</option>
                <option value="Minuman" <?php echo $jenis=="Minuman"?"selected":""; ?>> Minuman</option>
            </select>
            </tr>
            <tr> 
                <td>Id_Menu</td>
                <td><input type="text" name="id_menu" value=<?php echo $id;?>></td>
            </tr>
            <tr> 
                <td>Jenis</td>
                <td><input type="text" name="Jenis" value=<?php echo $jenis;?>></td>
            </tr>
            <tr> 
                <td>Stok</td>
                <td><input type="text" name="Stok" value=<?php echo $stok;?>></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="Nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Id_Penjual</td>
                <td>
                <select name="id_penjual"> 
                <?php while($isi = mysqli_fetch_array($query)): ?>
                        <option value="<?= $isi['id_penjual'];?>" ><?= $isi['nama']; ?></option>
                        <?php
                        while($data = mysqli_fetch_array($query)) {
                            $selected = $id_penjual == $data['id_penjual'] ? "selected" : 'asdsa';
                            echo '<option value="'.$data['id_penjual'].'" '.$selected.'> 
                                    '.$data['nama'].'
                                </option>';
                        }
                    ?>
                    <?php endwhile; ?>
            </select></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id_menu'];?>></td>
                <td><input type="submit" name="update" value="Tambah"></td>
            </tr>
        </table>
    </form>
</body>
</html>