<?php

/**
 * Configuration for database connection
 *
 */

$host       = "maulanafadilah.mysql.database.azure.com";
$username   = "maulanafadilah@maulanafadilah";
$password   = "@Sun997677";
$dbname     = "ases2pabw";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
