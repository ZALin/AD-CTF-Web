<?php
error_reporting(0);
include "flag.php";

// only admin in localhost can read this!?
if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1')
{
    header("Location: hacker.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page!</title>
</head>
<body>
Admin know the flag.
The flag is: <?php echo $flag; ?>
</body>
</html>

?>