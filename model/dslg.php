<?php
session_start();
session_destroy();

header("Location: ../pag/index.php");

?>