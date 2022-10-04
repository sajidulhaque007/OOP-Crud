<?php include 'inc/header.php'; ?>
<?php include 'config.php'; ?>
<?php include 'database.php'; ?>
<?php
$db = new database();
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $skill = mysqli_real_escape_string($db->link, $_POST['skill']);  
    if($name == '' || $email == '' || $skill == ''){
        $error = "Field must not be Empty !!";
       } else {
        $query = "INSERT INTO tbl_user(name, email, skill) 
         Values('$name', '$email', '$skill')";
        $create = $db->insert($query);
       }
    
}
?>
<?php
    if(isset($error)){
        echo "<span style='color:red'>".$error."</span>";
    }
?>
<form action="create.php" method="post">
<table>
    <tr>
        <td>Name: </td>
        <td><input type="text" name="name"></td>
    </tr>
    <tr>
        <td>Email: </td>
        <td><input type="text" name="email"></td>
    </tr>
    <tr>
        <td>Skill: </td>
        <td><input type="text" name="skill"></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" name="submit" value="submit">
            <input type="reset" value ="cancel">
        </td>
    </tr>
</table>
</form>
<a href="index.php">Home</a>































<?php include 'inc/footer.php'; ?>