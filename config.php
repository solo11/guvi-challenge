<!-- Config file to connect to database -->

<?php

   define('DB_SERVER', 'w1h4cr5sb73o944p.cbetxkdyhwsb.us-east-1.rds.amazonaws.com');
   define('DB_USERNAME', 'bl7qk85t5rzvnzo2');
   define('DB_PASSWORD', 'itbxc9setr7wf73u');
   define('DB_DATABASE', 'hw8ycc2k9cslb62v');
   $con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>