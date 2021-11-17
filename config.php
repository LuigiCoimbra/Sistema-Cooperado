<?php

$db_user = "id17077785_admin";
$db_pass = '?|Srz6GOz2lY|}D0';
$db_name = "id17077785_sistema_login";

$db = new PDO('mysql:host=localhost;dbname='. $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);