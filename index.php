<?php include 'inc/header.php'; ?>
<?php include 'config.php'; ?>
<?php include 'database.php'; ?>

<?php
$db    = new database();
$query = "Select * from tbl_user";
$read  = $db->select($query);
?>

<?php
    if(isset($_GET['msg'])){
        echo "<span style='color:green'>".$_GET['msg']."</span>";
    }
    $i =1;
?>

<table class="tblone">
    <tr>
        <th>SL.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Skill</th>
        <th>Action</th>
    </tr>
    <?php if($read){?>
    <?php while($row = $read->fetch_array()){?>
    <tr>
        <td><?php echo $i++;?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['skill'];?></td>
        <td><a href="update.php?id=<?php echo urlencode($row['id']);?>">Edit</a></td>
    </tr>

    <?php }?>
    <?php } else {?>

    <?php } ?>

</table>
<a href="create.php">Create User</a>































<?php include 'inc/footer.php'; ?>