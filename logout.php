<?php
session_start();
session_unset();
session_destroy();
header('Location:index.html');
echo '<script>alert("You have Logged Out")</script>';

?>
