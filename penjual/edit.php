<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $Nama=$_POST['Nama'];
    $id_penjual=$_POST['id_penjual'];
    $no_telp=$_POST['no_telp'];
    $Alamat=$_POST['Alamat'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE penjual SET Name='$Name',id_penjual='$id_penjual',no_telp='$no_telp' ,Alamat='$Alamat' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM penjual WHERE id=$id");
 
while($penjual_data = mysqli_fetch_array($result))
{
    $Nama = $penjual_data['name'];
    $id_penjual = $penjual_data['id'];
    $no_telp = $penjual_data['No_telp'];
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
                <td>Name</td>
                <td><input type="text" name="name" value=<?php echo $name;?>></td>
            </tr>
            <tr> 
                <td>id_penjual</td>
                <td><input type="text" name="id_penjual" value=<?php echo $id_penjual;?>></td>
            </tr>
            <tr> 
                <td>No_telp</td>
                <td><input type="text" name="Nomor" value=<?php echo $No_telp;?>></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="Alamat" value=<?php echo $Alamat;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>