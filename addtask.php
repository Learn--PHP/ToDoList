<?php
header("Content-type: text/html; charset=utf-8");
$type = $_POST['type'];
$deadline = date("Y-m-d" ,strtotime($_POST['deadline']));
$content = $_POST['content'];
echo date("Y-m-d" ,strtotime($_POST['deadline']));
require_once 'config.php';
header("Content-type: text/html; charset=utf-8");

$link = mysql_connect($MYSQL_URL, $MYSQL_USER, $MYSQL_PASSWORD);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
$db_selected = mysql_select_db('todolist', $link);
if (!$db_selected) {
    die ('Can\'t use todolist : ' . mysql_error());
}
$result = mysql_query('insert into todolist (type, deadline, content) values ("'.$type.'","'.$deadline.'","'.$content.'")');
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
echo "successfully";
header("Location: index.php");
?>