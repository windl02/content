<html lang="en">
<head></head>
<body>
<div class="wrapper">
    <h3>Thêm sinh viên</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
        <tr>
            <td>Họ tên</td>
            <td><input type="text" name="hoten" id=""></td>
        </tr>
        <tr>
            <td>Ngày sinh</td>
            <td><input type="date" name="ngaysinh" id=""></td>
        </tr>
        <tr>
            <td>Giới tính &nbsp;</td>
            <td><input type="text" name="gioitinh" id=""></td>
        </tr>
        <tr>
            <td>Lớp</td>
            <td>
                <select name="malop" id="">
                    <?php
                    foreach($lop as $record){
                    ?>
                    <option value="<?php echo $record->ma_lop ?>"><?php echo $record->ten_lop ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" accept="image/*" name="image" id=""></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="addbtn" id="" value="Thêm">
                <a href="index.php?controller=sinhvien&action=index">Hủy</a>
            </td>
        </tr>
        </table>
    </form>
</div>
</body>
</html>