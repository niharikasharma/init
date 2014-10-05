<?php
$dbhost = 'localhost:3036';
$dbuser = 'root';
$dbpass = 'password';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
//mysql_close($conn);

// Create database if not existing
$sql="CREATE DATABASE IF NOT EXISTS TODOS";
$result = mysql_query($sql);

if (! $result ) {
  die("Error creating database: " . mysql_error());
}

// Select database
$db_select = mysql_select_db("TODOS");
if (!$db_select) {
    die("Database selection failed: " . mysql_error());
}

// Create table if not existing
$query = "CREATE TABLE IF NOT EXISTS TODOTABLE (
          ID int(11) AUTO_INCREMENT,
          TODO varchar(255) NOT NULL,
          PRIMARY KEY  (ID)
          )";

if (! mysql_query($query)) {
  die("Error " . mysql_error());
}

?>
