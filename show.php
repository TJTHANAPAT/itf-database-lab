<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITF Lab</title>
</head>
<body>
<?php
$dbconfig = include('dbconfig.php');
$conn = mysqli_connect($dbconfig['host'], $dbconfig['username'], $dbconfig['password'], $dbconfig['database']);
if (!$conn)
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
$res = mysqli_query($conn, 'SELECT * FROM guestbook');
?>
<table width="600" border="1">
    <tr>
        <th width="100"> <div align="center">ID</div></th>
        <th width="100"> <div align="center">Name</div></th>
        <th width="350"> <div align="center">Comment </div></th>
        <th width="150"> <div align="center">Link </div></th>
        <th width="300"> <div align="center">Action </div></th>
    </tr>
<?php
while($row = mysqli_fetch_array($res))
{
?>
    <tr>
        <td><?php echo $row['ID'];?></div></td>
        <td><?php echo $row['Name'];?></div></td>
        <td><?php echo $row['Comment'];?></td>
        <td><?php echo $row['Link'];?></td>
        <td>
            <form action="delete.php" method="post">
                <input type="hidden" name="ID" value=<?php echo $row['ID'];?>>
                <button type="submit">Delete</button>
            </form>
            <form action="edit_form.php" method="post">
                <input type="hidden" name="ID" value=<?php echo $row['ID'];?>>
                <button type="submit">Edit</button>
            </form>
        </td>
    </tr>
<?php
}
mysqli_close($conn);
?>
</table>
<a href="insert_form.html">Insert</a>
</body>
</html>