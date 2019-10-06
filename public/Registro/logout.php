<?php
session_start();

session_unset();

session_destroy();

header('location: /phpMVC/public/Registro/index.php');