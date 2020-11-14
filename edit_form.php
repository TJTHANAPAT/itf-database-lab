<html>
<head>
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

$ID = $_POST['ID'];
$sql = "SELECT * FROM guestbook WHERE ID='$ID'";
$res = mysqli_query($conn, $sql);
$comment = mysqli_fetch_array($res);
?>
<form action="update.php" method="post">
    <input type="hidden" name="ID" value=<?php echo $comment['ID'];?>>
    Name:<br>
    <input type="text" name="name" placeholder="Enter Name" value=<?php echo $comment['Name'];?>> <br>
    Comment:<br>
    <textarea rows="10" cols="20" name="comment" placeholder="Enter Comment" ><?php echo $comment['Comment'];?></textarea><br>
    Link:<br>
    <input type="text" name="link" placeholder="Enter Link" value=<?php echo $comment['Link'];?>> <br><br>
    <button type="submit">Submit</button>
</form>

<?php
mysqli_close($conn);
?>
</body>
</html>