<?php
session_start();

session_destroy();

header("location:login.php?info=logout");
  ?>