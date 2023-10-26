<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $id=$_POST['id_penjual'];
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE penjual SET nama='$id',id_penjual='$nama',nama='$alamat' WHERE id_penjual=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id_penjual'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM penjual WHERE id_penjual=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $id = $user_data['id_penjual'];
    $name = $user_data['nama'];
    $alamat = $user_data['alamat'];
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
                <td>id_penjual</td>
                <td> <input type="text" name="id_penjual" value=<?php echo $id;?>></td>
                </td>
            </tr>
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value=<?php echo $name;?>></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id_penjual'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>