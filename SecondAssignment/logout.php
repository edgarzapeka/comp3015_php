<?php
session_start();
session_destroy();
session_destroy();
header('Location: login.php');
exit;