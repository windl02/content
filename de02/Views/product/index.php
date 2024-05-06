<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="">Toàn bộ sanh sách</label><br><br>
        <input type="text" name="pname" placeholder="Tên sản phẩm" id=""><br><br>
        <input type="text" name="pprice" placeholder="Giá sản phẩm" id="">
        <select style="margin-left: 5em;" name="ptype" id="">
            <?php
                foreach($type as $t){
            ?>
            <option value="<?php echo $t->ptype_id; ?>"><?php echo $t->ptype_name; ?></option>
            <?php
                }
            ?>
        </select>
        <br><br>
        <input type="submit" name="addbtn" value="Thêm" id=""><br>
    </form>

    <table>
        <tr>
            <td>Tên sản phẩm</td>
            <td>Giá</td>
            <td>Ngày nhập</td>
            <td>Loại</td>
            <td></td>
        </tr>
        <?php
                foreach($data as $record){
        ?>
        <form action="index.php?controller=sinhvien&action=edit&id=<?php echo $record->id; ?>" method="POST">
            
            <tr>
                <td><input type="text" name="pname" value="<?php echo $record->pname; ?>" id=""></td>
                <td><input type="number" name="pprice" value="<?php echo $record->pprice; ?>" id=""></td>
                <td><input type="date" name="pdate" value="<?php echo $record->pdate; ?>" id=""></td>
                <td>
                    <select name="ptype" id="">
                    <?php
                        foreach($type as $t){
                    ?>
                    <option <?php if ($t->ptype_id == $record->ptype_id) echo 'selected';?> value="<?php echo $t->ptype_id; ?>"><?php echo $t->ptype_name; ?></option>
                    <?php
                        }
                    ?>
                    </select>
                </td>
                <td>
                    <input type="submit" name="editbtn" value="Sửa" id="">
                </td>
            </tr>
        </form>
        <?php
            }
        ?>
    </table>
</body>
</html>