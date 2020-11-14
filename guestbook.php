<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITF Database Lab</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
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
<div class="container">
    <h1>Guestbook</h1>
    <table class="table table-responsive-md">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Comment</th>
                <th scope="col">Link</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
<?php
while($row = mysqli_fetch_array($res))
{
?>
        <tbody>
            <tr>
                <td><?php echo $row['Name'];?></div></td>
                <td><?php echo $row['Comment'];?></td>
                <td><?php echo $row['Link'];?></td>
                <td>
                    <div class="d-inline">
                        <form action="edit_form.php" method="post" class="d-inline">
                            <input type="hidden" name="ID" value=<?php echo $row['ID'];?>>
                            <button type="submit" class="btn btn-sm btn-primary mb-1">Edit</button>
                        </form>
                        <form action="delete.php" method="post" class="d-inline">
                            <input type="hidden" name="ID" value=<?php echo $row['ID'];?>>
                            <button type="submit" class="btn btn-sm btn-danger mb-1">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
<?php
}
mysqli_close($conn);
?>
    </table>
    <div class="text-center">
        <a href="insert_form.php" class="btn btn-primary">Insert</a>
    </div>
</div>
</body>
</html>