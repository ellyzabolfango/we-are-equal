<?php
include('../includes/db.php');
include('../includes/auth.php');
ifNotAdmin();

session_start();

$id = intval($_GET['id']);
$status = isset($_GET['is_approved']) && $_GET['is_approved'] == '1' ? 1 : 0;

$connection->query("UPDATE stories SET is_approved = $status WHERE id = $id");

$_SESSION['alert'] = $status ? 'Story set to Active.' : 'Story set to Inactive.';
header("Location: ../admin.php");
exit();
