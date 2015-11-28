<?php

function db_connect()
{
   $result = new mysqli('mysql5.000webhost.com', 'a8995321_user', 'p4m266a-mlv', 'a8995321_user'); 
   if (!$result)
     throw new Exception('Could not connect to database server');
   else
     return $result;
}

?>
