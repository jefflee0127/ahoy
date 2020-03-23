<?php

$conn = mysqli_connect("localhost", "root", "cw6y9m", "opentutorials");
mysqli_query($conn, "
    INSERT INTO topic
     (title, description, date)
     VALUES(
      'MySQL',
      'MySQL is...',
      NOW()
    )
  ");
 ?>
