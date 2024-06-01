<?php
session_start();

echo "Signed out succesfully";
session_destroy();
header('Location: login.html');

exit;
?>