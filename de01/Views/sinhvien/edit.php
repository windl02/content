<html lang="en">
<head></head>
<body>
<div class="wrapper">
    <h3>Sửa thông tin sinh viên</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
        <tr>
            <td><input type="hidden" name="image_old" value="<?php echo $data->image; ?>" id=""></td>
            <td><input type="hidden" name="ma_sv" value="<?php echo $data->ma_sv; ?>" id=""></td>
        </tr>
        <tr>
            <td>Họ tên</td>
            <td><input type="text" name="hoten" value="<?php echo $data->ten_sv; ?>" id=""></td>
        </tr>
        <tr>
            <td>Ngày sinh</td>
            <td><input type="date" name="ngaysinh" value="<?php echo $data->ngaysinh; ?>" id=""></td>
        </tr>
        <tr>
            <td>Giới tính &nbsp;</td>
            <td><input type="text" name="gioitinh" value="<?php echo $data->gioitinh; ?>" id=""></td>
        </tr>
        <tr>
            <td>Lớp</td>
            <td>
                <select name="malop" id="">
                    <?php
                    foreach($lop as $record){
                    ?>
                    <option <?php if($record->ma_lop == $data->ma_lop) echo 'selected' ?> value="<?php echo $record->ma_lop ?>"><?php echo $record->ten_lop ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" accept="image/*" name="image" id=""><img src="<?php echo $data->image; ?>" alt=""></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="editbtn" id="" value="Sửa">
                <a href="index.php?controller=sinhvien&action=index">Hủy</a>
            </td>
        </tr>
        </table>
    </form>
</div>
</body>
</html>