<?php

require_once ('Models/product.php');
require_once ('Models/type.php');

if (isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = '';

switch($action)
{
    case 'index':
    {
        $data   = Product::getProduct();
        $type   = Type::getType();

        if (isset($_POST['addbtn'])){

            $data = [
                'id'        =>  '',
                'pname'     =>  $_POST['pname'],
                'pprice'    =>  $_POST['pprice'],
                'pdate'     =>  date('Y-m-d'),
                'ptype_id'  =>  $_POST['ptype'],
            ];

            Product::addProduct($data);
            header('Location: index.php?controller=product&action=index');
        }

        require_once('Views/product/index.php');
        break;
    }
    case 'edit':
    {
        if (isset($_GET['id'])){

            $id = $_GET['id'];
            $data = [
                'pname'     =>  $_POST['pname'],
                'pprice'    =>  $_POST['pprice'],
                'pdate'     =>  $_POST['pdate'],
                'ptype_id'  =>  $_POST['ptype']
            ];

            Product::editProduct($id, $data);
            header('Location: index.php?controller=product&action=index');
        }
    }
}

?>