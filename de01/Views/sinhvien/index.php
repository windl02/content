<html>
<head>
    <style>
        table {
            counter-reset: 0;
        }
        table tr {
            counter-increment: rowNumber;
        }
        table tr td:first-child::before {
            content: counter(rowNumber);
        }
    </style>
</head>
<body>
    <input type="searchtxt" name="search" id="">
	<input type="button" name="searchbtn" id="" value="Search">
	<br><br>
	<table border="1">
		<thead>
			<th>STT</th>
			<th>ten_sv</th>
			<th>ngaysinh</th>
			<th>gioitinh</th>
            <th>lop</th>
            <th>hinhanh</th>
			<th>func</th>
		</thead>
		<?php
		foreach($data as $record){
		?>
		<tr>
			<td></td>
			<td><?php echo $record->ten_sv; ?></td>
			<td><?php echo $record->ngaysinh; ?></td>
			<td><?php echo $record->gioitinh; ?></td>
            <td><?php echo $record->ten_lop; ?></td>
            <td><img src="<?php echo $record->image ?>" alt=""></td>
			<td>
				<a href="index.php?controller=sinhvien&action=edit&id=<?php echo $record->ma_sv; ?>">Sửa</a>
				<a href="index.php?controller=sinhvien&action=del&id=<?php echo $record->ma_sv; ?>">Xóa</a>
			</td>
		</tr>
		<?php		
			}
		?>
	</table>
	<br><br>
	<a href="index.php?controller=sinhvien&action=add">Thêm</a>
</body>
</html>