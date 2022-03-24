<?php 
      $con = mysqli_connect("localhost", "root", "");
      $db = mysqli_select_db($con, "aula3");

      if (!$con || !$db) print @mysqli_error($con);
?>