<?php
require_once 'config.php';
header("Content-type: text/html; charset=utf-8");
$id = $_GET['task-id'];
echo $_GET['task-id'];

$link = mysql_connect($MYSQL_URL, $MYSQL_USER, $MYSQL_PASSWORD);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
$db_selected = mysql_select_db($MYSQL_DB_NAME, $link);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}
$result = mysql_query('delete from todolist where id = '.$id.';');
echo "delete from todolist where id = ".$id.";";
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
echo "successfully";
header("Location: index.php");
?>