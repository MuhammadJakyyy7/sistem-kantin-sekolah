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
                <td>id_penjual</td>
                <td><input type="text" name="id_penjual"></td>
            </tr>
            <tr> 
                <td>nama</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr> 
                <td>Nomor Telpon</td>
                <td><input type="text" name="no_telp"></td>
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
        $id = $_POST['id_penjual'];
        $nama = $_POST['name'];
        $alamat = $_POST['alamat'];
        $nomor = $_POST['no_telp'];
        
        
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO penjual(id_penjual,nama,alamat,no_telp) VALUES('$id','$nama','$alamat','$nomor')");
        
        // Show message when user added
        echo "User added successfully. <a href='index.php'>View penjual</a>";
    }
    ?>
</body>
</html>