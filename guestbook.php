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
<div class="container-fluid">
    <h1>Guestbook</h1>
    <table class="table table-responsive-md table-hover table-dark mt-4">
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
                    <div>
                        <form action="edit_form.php" method="post" class="d-inline">
                            <input type="hidden" name="ID" value=<?php echo $row['ID'];?>>
                            <button type="submit" class="btn btn-sm btn-outline-orange btn-comment-action">Edit</button>
                        </form>
                        <form action="delete.php" method="post" class="d-inline">
                            <input type="hidden" name="ID" value=<?php echo $row['ID'];?>>
                            <button type="submit" class="btn btn-sm btn-outline-danger btn-comment-action">Delete</button>
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
        <a href="insert_form.php" class="btn btn-outline-orange">Add New Comment</a>
    </div>
    <footer>
        <hr>
        <p>Created by TJTHANAPAT. This site is part of studying Information Technology Fundamentals, Academic Year of 2020, Faculty of Information Technology, KMITL.</p>
    </footer>
</div>
</body>
</html>