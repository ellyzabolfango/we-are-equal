<?php
include('../includes/db.php');
include('../includes/auth.php');
ifNotAdmin();

session_start();

$id = intval($_GET['id']);
$connection->query("DELETE FROM stories WHERE id = $id");

$_SESSION['alert'] = 'Story deleted successfully.';
header("Location: ../admin.php");
exit();
