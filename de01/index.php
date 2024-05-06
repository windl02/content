<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
</head>
</html>

<?php

include 'Models/dbconfig.php';

$db = new Database;
$db->connect();

if (isset($_GET['controller']))
    $controller = $_GET['controller'];
else
    $controller = '';

switch ($controller)
{
    case 'sinhvien':
    {
        require_once('Controllers/sinhvien.php');
        break;
    }
    default:
    {
        require_once('Controllers/sinhvien.php');
        break;
    }
}

?>