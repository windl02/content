<?php

require_once ('Models/sinhvien.php');
require_once ('Models/lop.php');

if (isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = '';

switch($action)
{
    case 'index':
    {
        $data   = Sinhvien::getSinhvien();
        require_once('Views/sinhvien/index.php');
        break;
    }
    case 'add':
    {
        if (isset($_POST['addbtn'])){

            $imgurl     = $_FILES['image']['name'];
            $imgpath    = "Images/".basename($imgurl);
            move_uploaded_file($_FILES['image']['tmp_name'], $imgpath);

            $data = [
                'ma_sv'     =>  '',
                'ten_sv'    =>  $_POST['hoten'],
                'ngaysinh'  =>  $_POST['ngaysinh'],
                'gioitinh'  =>  $_POST['gioitinh'],
                'ma_lop'    =>  $_POST['malop'],
                'image'     =>  "Images/".$imgurl
            ];

            Sinhvien::addSinhvien($data);
            header('Location: index.php?controller=sinhvien&action=index');
        }
        else{
            $lop = Lop::getLop();
            require_once('Views/sinhvien/add.php');
        }
        break;
    }
    case 'edit':
    {
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $data = Sinhvien::getSinhvien("ma_sv = '$id'")[0];

            if (isset($_POST['editbtn'])){
                $imageurl = '';
                if (isset($_FILES['image'])){
                    $imgurl     = $_FILES['image']['name'];
                    $imgpath    = "Images/".basename($imgurl);
                    move_uploaded_file($_FILES['image']['tmp_name'], $imgpath);
                    $imageurl = "Images/".$imgurl;
                }else{
                    $imageurl = $_POST['image_old'];
                }

                $id = $_POST['ma_sv'];
                $data = [
                    'ten_sv'    =>  $_POST['hoten'],
                    'ngaysinh'  =>  $_POST['ngaysinh'],
                    'gioitinh'  =>  $_POST['gioitinh'],
                    'ma_lop'    =>  $_POST['malop'],
                    'image'     =>  $imageurl
                ];

                Sinhvien::editSinhvien($id, $data);
                header('Location: index.php?controller=sinhvien&action=index');
            }
            else{
                $lop = Lop::getLop();
                require_once('Views/sinhvien/edit.php');
            }
        }
    }
}

?>