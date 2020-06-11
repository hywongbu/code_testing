<?php

session_start();
//release variable
session_unset();

session_destroy();

header("Location: ../index.php");