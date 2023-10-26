<html>
<head>
    <title>Add Users</title>
</head>
 
<body>
    <a href="index.php">Go to Home</a>
    <a href="index.php">Pilih</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Id_menu</td>
                <td><input type="text" name="id_menu"></td>
            </tr>
            <tr> 
                <td>Jenis</td>
                <td>
                <select name="Jenis">
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
                </select>
                </td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="text" name="Harga"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="Nama"></td>
            </tr>
            <tr> 
                <td>Stok</td>
                <td><input type="text" name="Stok"></td>
            </tr>
            <tr> 
                <td>Penjual</td>
                <td>
                <select name="Penjual">
                <?php
                include_once("config.php");
                $penjual = mysqli_query($mysqli, "SELECT * FROM penjual ORDER BY id_penjual");
                while($data = mysqli_fetch_array($penjual)){
                    echo '<option value="' .$data['id_penjual'].'">' .$data['nama']. '</option>';
                }
                ?>
                </select>
                </td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $id = $_POST['id_menu'];
        $jenis = $_POST['Jenis'];
        $harga = $_POST['Harga'];
        $nama = $_POST['Nama'];
        $stok = $_POST['Stok'];
        $penjual = $_POST['Penjual'];
        
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO menu(id_Menu,Jenis,Harga,Nama,Stok,Penjual) VALUES('$id','$jenis','$harga','$nama','$stok','$penjual')");
        
        // Show message when user added
        echo "User added successfully. <a href='index.php'>View menu</a>";
    }
    ?>
</body>
</html>